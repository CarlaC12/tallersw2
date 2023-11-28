<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NegocioController extends Controller
{
    public function reparaciones()
    {
        $apiURL = env('API_BI');
        return view("reportes.reporte1", compact('apiURL'));
       
    }

    public function beneficios()
    {
        $apiURL = env('API_BI');
        
         return view("reportes.reporte2", compact('apiURL'));
    }

    
}