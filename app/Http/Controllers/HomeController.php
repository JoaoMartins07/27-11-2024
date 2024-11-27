<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Exibe o painel inicial.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('home');
    }
}
