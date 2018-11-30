<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Traits\Status;

class IndexController extends Controller implements \App\Contracts\Status
{
    use Status;

    public function index()
    {
        return view('front.index', compact('quotes', 'offerGroups', 'news'));
    }
}
