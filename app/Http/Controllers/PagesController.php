<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $title = 'Welcome to Desktop Laravel';
        //return view('pages.index', compact('title'));
        return view('pages.index')->with('title', $title);
    }

    public function about(){
        $title = 'About us!';
        return view('pages.about')->with('title', $title);
    }
    public function services(){

        $data = array(
            'title' => 'Our Services Agora',
            'services' => ['Web Design', 'SEO', 'Online Marketing'] 
        );        
        return view('pages.services')->with($data);
    }
}
