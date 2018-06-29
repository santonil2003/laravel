<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
      public function index()
    {
        //
        return "Test index";
    }

  
    public function show($id)
    {
        //
        return "Test show :$id";
    }

}
