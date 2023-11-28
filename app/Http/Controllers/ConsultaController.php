<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ConsultaController extends Controller
{
    public$API_IA;

    public function __construct() {
        $this->API_IA = env('API_IA', '');
    }

    public function index()
    {
        $url = "{$this->API_IA}/api/items";
        try {
            $items = Http::get($url)->json();
            
        } catch (\Throwable $th) {
            $items = [];
        }
        return view('consultas.index', compact('items'));
    }
    
    public function consulta_get(Request $request)
    {
        $items = [];
        try {
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $url = "{$this->API_IA}/api/items/get-compara";
                // foreach ($files as $file) {
                $response = Http::attach(
                    'img', // Nombre del archivo en el formulario
                    file_get_contents($file->path()),
                    $file->getClientOriginalName()
                )->post($url);
                if ($response->successful())                 
                    $items = $response->json();                                
            }
        } catch (\Throwable $th) {
            
        }
        return view('consultas.index', compact('items'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
