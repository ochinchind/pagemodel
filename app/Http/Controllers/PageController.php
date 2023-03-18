<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pages;

class PageController extends Controller
{
    public $current = false;

    public $tree = [];

    public function getTree(){
        foreach(Pages::all() as $page){
            $this->tree[$page->id] = $page;
        }
    }

    public function route($any = null){
        $this->getTree();
        //dd($this->tree);
        foreach($this->tree as $slug){
            //dd( $any);
            if($slug['slug'] == $any ){
                $this->current = $slug;
            }
        }
        // If current isn't set raise a 404
        if (!$this->current) {
            abort(404);
        }
        $page = $this->current; 

        return view('welcome', compact('page'));

    }




}
