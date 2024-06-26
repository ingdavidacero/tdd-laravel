<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Repository;

class PageController extends Controller
{
    public function home(){
        return view('welcome',[
            'repositories' => Repository::latest()->get()
        ]);
    }
}
