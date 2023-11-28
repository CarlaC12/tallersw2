<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CotizacionIAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            // Aumentar el tiempo de respuesta para todas las solicitudes
            set_time_limit(300);
            // Cree una instancia de Guzzle
            $client = new Client();
            $response = $client->get(env('API_IA'));
            //dd(json_decode($response->getBody(), true)['data']['rows']);
            $cotizaciones = json_decode($response->getBody(), true)['data']['rows'];
            return view('cotizaciones.index', compact('cotizaciones'));
        } catch (\Throwable $th) {
            $cotizaciones = [];
            return view('cotizaciones.index', compact('cotizaciones'))->with('danger', 'Error: Error del servidor de la API Cotizaciones.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cotizaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            if ($request->type == 1) {
                $services = Servicio::all();
                // Aumentar el tiempo de respuesta para todas las solicitudes
                set_time_limit(300);
                //
                $file = $request->file('imagen');
                $fileName = $file->getClientOriginalName();

                // Mueve el archivo a la carpeta 'public/uploads'
                $file->move(public_path('uploads'), $fileName);

                // Obtiene la dirección completa del archivo
                $filePath = public_path('uploads/' . $fileName);
                // Cree una instancia de Guzzle
                $client = new Client();

                $response = $client->post(
                    env('API_IA'),
                    [
                        'headers' => [
                            'Accept' => 'application/json',
                        ],
                        'multipart' => [
                            [
                                'name' => 'imagen',
                                'contents' => fopen($filePath, 'r'),
                            ],
                            [
                                'name' => 'services',
                                'contents' => $services,
                            ]
                        ],
                    ]
                );
                $services_ia = json_decode($response->getBody(), true)['data'];
                $url = json_decode($response->getBody(), true)['url'];
                //dd($services_ia);
                return view('cotizaciones.ia', compact('services_ia', 'url'));
            } else {
                if ($request->type == 2) {
                } else {
                    return redirect()->route('cotizaciones.index');
                }
            }
        } catch (\Throwable $th) {
            return redirect()->route('cotizaciones.index')->with('danger', 'Error: Error del servidor de la API Cotizaciones.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('cotizaciones.edit');
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
        return redirect()->route('cotizaciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect()->route('cotizaciones.index');
    }
}
