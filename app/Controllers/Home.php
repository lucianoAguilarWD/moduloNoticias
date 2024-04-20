<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'titulo' => 'prueba'
        ];
        return view('prueba', $data);
    }
}
