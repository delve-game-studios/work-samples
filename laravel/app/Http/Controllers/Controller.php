<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NavigationController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\OffersController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\PressController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\QuotesController;
use App\Models\Navigation;
use App\Models\Setting;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        View::share('version', file_get_contents(base_path('version')));
        View::share('frontMenu', $this->frontMenu());
        View::share('adminMenu', $this->adminMenu());
        View::share('settings', Setting::all());

        // Adding global optional support for breadcrumbs
        if (!empty(static::$breadcrumb)) {
            View::share('breadcrumb', static::$breadcrumb);
        }
    }

    public function adminMenu()
    {
        return [
            DashboardController::$menu,
            PagesController::$menu,
            NewsController::$menu,
            PressController::$menu,
            BookController::$menu,
            QuotesController::$menu,
            NavigationController::$menu,
            ProductsController::$menu,
            OffersController::$menu,
        ];
    }

    private function frontMenu()
    {
        return Navigation::public()->parentsOnly()->get();
    }

    protected function addToBreadcrumb($item)
    {
        $breadcrumb = View::shared('breadcrumb');
        array_push($breadcrumb, $item);
        View::share('breadcrumb', $breadcrumb);
    }
}
