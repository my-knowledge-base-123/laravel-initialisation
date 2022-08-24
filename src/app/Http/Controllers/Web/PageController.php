<?php

namespace App\Http\Controllers\Web;


use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        return view('pages.welcome');
    }
}
