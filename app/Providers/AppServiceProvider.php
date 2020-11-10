<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\Category;
use App\Setting;
use App\User as Vendor;
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
       
        $data = array(
            'AppCategories' => $categories,
            'AppTopVendors' => Vendor::with('profile')->get(),
            'AppHeaderScript' => Setting::where('name','header_scripts')->first()->value,
            'AppFooterScript' => Setting::where('name','footer_scripts')->first()->value,
            'AppBannerImg' => Setting::where('name','home_hero')->first()->value,
            'AppDashboardBannerImg' => Setting::where('name','dashboard_banner')->first()->value
        );
        View::share($data);
    }
}
