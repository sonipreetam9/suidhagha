<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\CategorieModel;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $comp_webtitle="Suidhagha-Shop online Ethnic Wear";
        $comp_name="Sui-Dhagha";
        $comp_mobile="+91 99999-90900";
        $comp_mobile1="+91 90900-99999";
        $comp_email="suidhaga@gmail.com";
        $comp_email1="newsuidhaga@gmail.com";
        $comp_address="Sirsa,Haryana 125055";
        view()->share('comp_name',$comp_name);
        view()->share('comp_mobile', $comp_mobile);
        view()->share('comp_mobile1', $comp_mobile1);
        view()->share('comp_email', $comp_email);
        view()->share('comp_email1', $comp_email1);
        view()->share('comp_address', $comp_address);
        view()->share('comp_webtitle', $comp_webtitle);
        $categories = CategorieModel::orderBy("seq", "asc")->get();
        view()->share('categories', $categories);
    }
}
