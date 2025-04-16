<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category; // Thêm dòng này
use Illuminate\Support\Facades\View;


use Illuminate\Support\Facades\Session;
class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $categories = Category::all();
        View::share('categories', $categories); // Chia sẻ biến categories cho mọi view
    }

    public function register()
    {
        //
    }
}
