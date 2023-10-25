<?php

namespace App\Http\Controllers;

use App\Models\Post;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function about (){
        return view('items.article.about-us');
    }
    public function people (){
        return view('items.article.our-people');
    }
    public function vision (){
        return view('items.article.our-vision');
    }
    public function we_do (){
        return view('items.article.what-we-do');
    }
    public function catalog (){
        $posts = Product::all();
        return view('items.catalog', compact('posts'));
    }



}

