<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home'
        ];
        echo view('index', $data);
    }
    
    public function prediksi()
    {
        $data = [
            'title' => 'Prediksi'
        ];
        echo view('prediksi', $data);
    }
}
