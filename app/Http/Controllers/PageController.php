<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pages;

class PageController extends Controller
{
    public function page(){
        $page = Pages::first();
        return view('welcome',compact('page') );
    }


}
