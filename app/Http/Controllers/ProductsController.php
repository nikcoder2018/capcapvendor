<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;



use App\Product;
use App\ProductTag;
use App\ProductCategory;
use App\ProductVisit;
use App\Category;
use App\Tag;

use Carbon\Carbon;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::with('categories')->where('vendor_id', auth()->user()->id)->paginate(10);

        #return response()->json($data);
        return view('contents.products', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::all();
        $data['tags'] = Tag::all();
        $data['categoriesHTML'] = Category::BuildTreeHTML2(Category::all()->toArray());
        return view('contents.products-create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();

        $newProduct = new Product();
        $newProduct->vendor_id = auth()->user()->id;
        $newProduct->title = $validated['title'];
        $newProduct->description = $request->description;

        if($request->delivery == 'on'){
            $newProduct->delivery = 1;
            $newProduct->delivery_location = $request->delivery_location;
        }else{
            $newProduct->delivery = 0;
            $newProduct->delivery_location = '';
        }
        
        if($request->take_away == 'on'){
            $newProduct->take_away = 1;
        }else{
            $newProduct->take_away = 0;
        }
        
        $slug = $this->slugify($validated['title']);
        if(!Product::where('slug', $slug)->exists()){
            $newProduct->slug = $slug;
        }else{
            $newProduct->slug = $slug.'_'.time();
        }
   
        $newProduct->regular_price = $validated['price'];

        if($request->hasFile('image')){
            if($request->file('image')->isValid()){
                // Get image file
                $image = $request->file('image');

                // Make a image name based on user name and current timestamp
                $name = Str::slug($request->input('title')).'_'.time();
                $extension = $request->image->extension();
                $upload = $request->file('image')->storeAs(
                    'public/products', 
                    $name.".".$extension,
                    'admin'
                );
                $url = Storage::url('products/'.$name.".".$extension);

                $newProduct->image_url = $url;
            }
        }
        
        $newProduct->save();

        if($request->tags){
            $tags = explode(',', $request->tags);

            foreach($tags as $tag){
                $newProductTag = new ProductTag;
                $newProductTag->product_id = $newProduct->id;
                $newProductTag->tag = $tag;
                $newProductTag->save();
            }
        }

        if($request->categories){
            foreach($request->categories as $category){
                $newProductCategory = new ProductCategory;
                $newProductCategory->product_id = $newProduct->id;
                $newProductCategory->category_id = $category;
                $newProductCategory->save();
            }
        }
        return response()->json(array('success'=> true, 'msg' => 'Product successfully saved.'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id, $slug)
    {
        $product = Product::with(['vendor','categories', 'tags'])->where('vendor_id', $id)->where('slug', $slug)->first();

        //check if ip is already visited the link
        $visits = ProductVisit::where('ip_address', $request->ip())->where('product_id', $product->id)->orderBy('date', 'DESC')->first();
        
        if($visits){
            $diff = Carbon::parse(Carbon::now())->diffInDays($visits->date);
            if($diff > 0){
                $this->uniqVisitCounter($request->ip(),$product->id,$product->vendor_id, $request->server('HTTP_USER_AGENT'));
            }
        }else{
            $this->uniqVisitCounter($request->ip(),$product->id,$product->vendor_id,$request->server('HTTP_USER_AGENT'));
        }
        $data['product'] = $product;

        #return response()->json($data);
        return view('contents.products-detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['categories'] = Category::all();
        $data['tags'] = Tag::all();
        $data['categoriesHTML'] = Category::BuildTreeHTML2(Category::all()->toArray(), 0, ProductCategory::where('product_id', $id)->get());
        $data['product'] = Product::with(['vendor','categories','tags'])->where('id',$id)->first();
        return view('contents.products-edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request)
    {
        $validated = $request->validated();

        $product = Product::find($request->id);
        $product->title = $validated['title'];
        $product->description = $request->description;

        if($request->delivery == 'on'){
            $product->delivery = 1;
            $product->delivery_location = $request->delivery_location;
        }else{
            $product->delivery = 0;
            $product->delivery_location = '';
        }
        
        if($request->take_away == 'on'){
            $product->take_away = 1;
        }else{
            $product->take_away = 0;
        }
        

        $slug = $this->slugify($validated['title']);
        if(!Product::where('slug', $slug)->exists()){
            $product->slug = $slug;
        }else{
            $product->slug = $slug.'_'.time();
        }
   
        $product->regular_price = $validated['price'];

        if($request->hasFile('image')){
            if($request->file('image')->isValid()){
                // Get image file
                $image = $request->file('image');

                // Make a image name based on user name and current timestamp
                $name = Str::slug($request->input('title')).'_'.time();
                $extension = $request->image->extension();
                $upload = $request->file('image')->storeAs(
                    'public/products', 
                    $name.".".$extension,
                    'admin'
                );
                $url = Storage::url('products/'.$name.".".$extension);

                $product->image_url = $url;
            }
        }
        
        $product->save();
        ProductTag::where('product_id', $product->id)->delete();
        if($request->tags){
            $tags = explode(',', $request->tags);

            foreach($tags as $tag){
                $newProductTag = new ProductTag;
                $newProductTag->product_id = $product->id;
                $newProductTag->tag = $tag;
                $newProductTag->save();
            }
        }
        ProductCategory::where('product_id', $product->id)->delete();
        if($request->categories){
            foreach($request->categories as $category){
                $newProductCategory = new ProductCategory;
                $newProductCategory->product_id = $product->id;
                $newProductCategory->category_id = $category;
                $newProductCategory->save();
            }
        }
        return response()->json(array('success'=> true, 'msg' => 'Product successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $delete = Product::find($request->product_id)->delete();
        if($delete)
            return response()->json(array('success' => true, 'msg' => 'Product successfully deleted.'));
    }

    public function slugify($text){
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
            
        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
    
        // trim
        $text = trim($text, '-');
    
        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);
    
        // lowercase
        $text = strtolower($text);
    
        if (empty($text)) {
            $text = 'n-a';
        }
    
        return $text;
    }

    public function uniqVisitCounter($ip_address, $id, $vendor_id, $useragent){
        $create = ProductVisit::create([
            'ip_address' => $ip_address,
            'product_id' => $id,
            'vendor_id' => $vendor_id,
            'user_agent' => $useragent,
            'date' => date('Y-m-d H:i:s')
        ]);
    }
}
