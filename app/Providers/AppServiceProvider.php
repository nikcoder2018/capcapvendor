<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $categories = array();
        $parents = Category::where('parent', null)->get();
        
        foreach($parents as $index=>$parent){
            $childrens = Category::where('parent', $parent->id)->get();
            if(count($childrens) > 0){
                $category = array(
                    'parent' => $parent,
                    'childrens' => $childrens
                );
                $categories[$index] = $category;
            }else{
                $categories[$index] = $parent;
            }
        }
       

        View::share('AppCategories', $categories);
    }
}
