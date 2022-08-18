<?php

namespace App\Http\Controllers\Web;


use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    public function home(): Factory|View|Application
    {
        return view('pages.welcome');
    }
}
