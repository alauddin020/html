<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        if (is_null($this->alal)) {
            return view('welcome');
        }
        return  $this->alal['name'];
    }
}
