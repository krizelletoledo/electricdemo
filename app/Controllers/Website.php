<?php

namespace App\Controllers;

class Website extends BaseController
{
    public function index(): string
    {
        return view('home', [
            'title' => 'Puihaha Electric - Reliable Energy Solutions',
            'page'  => 'home',
        ]);
    }
}
