<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EntradaSalida;
use App\Models\Salida;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Collection;
//use Spatie\Activitylog\Models\Activity;




class SalidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salidas = EntradaSalida::where('tipo', 2)->get();
        try {
            // Aumentar el tiempo de respuesta para todas las solicitudes
            set_time_limit(300);
            // Cree una instancia de Guzzle
            $client = new Client();
            $response = $client->get(env('API_FILE') . '/list');
            //dd(json_decode($response->getBody(), true)['data']);
            $imagenes = json_decode($response->getBody(), true)['data'];
            return view('salidas.index', compact('salidas', 'imagenes'));
        } catch (\Throwable $th) {
            $imagenes = [];
            return view('salidas.index', compact('salidas', 'imagenes'))->with('danger', 'Error: Error del servidor de la API FILES.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('salidas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required',
            'hora' => 'required',
            'tipo' => 'required',
        ]);

        $salida = new Salida();
        $salida->hora = $request->hora;
        $salida->fecha = $request->fecha;
        $salida->descripcion = $request->descripcion;
        $salida->tipo = $request->tipo;
        $salida->save();

        try {
            // Aumentar el tiempo de respuesta para todas las solicitudes
            set_time_limit(300);
            //
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();

            // Mueve el archivo a la carpeta 'public/uploads'
            $file->move(public_path('uploads'), $fileName);

            // Obtiene la dirección completa del archivo
            $filePath = public_path('uploads/' . $fileName);
            // Cree una instancia de Guzzle
            $client = new Client();

            $response = $client->post(
                env('API_FILE'). '/add',
                [
                    'headers' => [
                        'Accept' => 'application/json',
                    ],
                    'multipart' => [
                        [
                            'name' => 'file',
                            'contents' => fopen($filePath, 'r'),
                        ],
                        [
                            'name' => 'id_foranea',
                            'contents' => $salida->id,
                        ]
                    ],
                ]
            );
            /*$services_ia = json_decode($response->getBody(), true)['data'];
            $url = json_decode($response->getBody(), true)['url'];*/
            //dd($services_ia);
            return redirect()->route('salidas.index');
        } catch (\Throwable $th) {
            return redirect()->route('salidas.index')->with('danger', 'Error: Error del servidor de la API Files.');
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
        $salida = Salida::findOrFail($id);
        // return $salida;
        $images = DB::table('imagenes')->where('entradaSalidaId', $id)->get();

        return view('salidas.show', compact('salida', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $salida = Salida::findOrFail($id);
        return view('salidas.edit', compact('salida'));
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
        $salida = EntradaSalida::FindOrFail($id);
        $salida->delete();
        try {
            // Aumentar el tiempo de respuesta para todas las solicitudes
            set_time_limit(300);
            // Cree una instancia de Guzzle
            $client = new Client();

            $response = $client->delete(
                env('API_FILE'). '/delete/' . $id,
                [
                    'headers' => [
                        'Accept' => 'application/json',
                    ],
                    'multipart' => [
                        [
                            'name' => 'id_foranea',
                            'contents' => $id,
                        ]
                    ],
                ]
            );
            return redirect()->route('salidas.index');
        } catch (\Throwable $th) {
            return redirect()->route('salidas.index')->with('danger', 'Error: Error del servidor de la API Files.');
        }
    }
}