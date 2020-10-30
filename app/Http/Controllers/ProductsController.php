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
use App\Category;
use App\Tag;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::paginate(10);
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
        $newProduct->slug = $request->slug;
        $newProduct->description = $request->description;

        $slug = $this->slugify($validated['title']);
        if(!Product::where('slug', $slug)->exists()){
            $newProduct->slug = $slug;
        }else{
            $newProduct->slug = $slug.'_'.time();
        }
   
        $newProduct->regular_price = $validated['regular_price'];

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
    public function show($id, $slug)
    {
        $data['product'] = Product::with(['categories', 'tags'])->where('vendor_id', $id)->where('slug', $slug)->first();
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
}
