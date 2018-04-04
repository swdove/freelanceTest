<?php

namespace FreelanceTest\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getHome(){
        return view('home');
    }

    public function getAbout(){
        return view('about');
    }

    public function getContact(){
        return view('contact');
    }

    public function getWelcome(){
        return view('welcome');
    }

    public function getPosts(){
        return view('posts/index');
    }

    public function getBlog(){
        return view('blog/index');
    }

    public function getArticles(){
        return view('articles/index');
    }    
}
