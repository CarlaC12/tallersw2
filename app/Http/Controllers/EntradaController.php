<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\EntradaSalida;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

//use Spatie\Activitylog\Models\Activity;



class EntradaController extends Controller
{
    public $API_FILE;

    public function __construct()
    {
        $this->API_FILE = env('API_FILE', '');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entradas = EntradaSalida::where('tipo', 1)->get();
        try {
            // Aumentar el tiempo de respuesta para todas las solicitudes
            set_time_limit(300);
            // Cree una instancia de Guzzle
            $client = new Client();
            $response = $client->get(env('API_FILE') . '/list');
            //dd(json_decode($response->getBody(), true)['data']);
            $imagenes = json_decode($response->getBody(), true)['data'];
            return view('entradas.index', compact('entradas', 'imagenes'));
        } catch (\Throwable $th) {
            $imagenes = [];
            return view('entradas.index', compact('entradas', 'imagenes'))->with('danger', 'Error: Error del servidor de la API FILES.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entradas.create');
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
        $entrada = new Entrada();
        $entrada->hora = $request->hora;
        $entrada->fecha = $request->fecha;
        $entrada->descripcion = $request->descripcion;
        $entrada->tipo = $request->tipo;
        $entrada->save();
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
                            'contents' => $entrada->id,
                        ]
                    ],
                ]
            );
            /*$services_ia = json_decode($response->getBody(), true)['data'];
            $url = json_decode($response->getBody(), true)['url'];*/
            //dd($services_ia);
            return redirect()->route('entradas.index');
        } catch (\Throwable $th) {
            return redirect()->route('entradas.index')->with('danger', 'Error: Error del servidor de la API Files.');
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
        $entrada = Entrada::findOrFail($id);
        $url = "{$this->API_FILE}/api/archivo/get-files/{$id}";
        // $images = DB::table('imagenes')->where('entradaSalidaId', $id)->get();
        try {
            $images = Http::get($url)->json();
        } catch (\Throwable $th) {
            $images = [];
        }
        return view('entradas.show', compact('entrada', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Entrada $entrada)
    {
        return $entrada;
        // $entrada = Entrada::findOrFail($id);
        // return view('entradas.edit', compact('entrada'));
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
        $entrada = EntradaSalida::FindOrFail($id);
        $entrada->delete();
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
            return redirect()->route('entradas.index');
        } catch (\Throwable $th) {
            return redirect()->route('entradas.index')->with('danger', 'Error: Error del servidor de la API Files.');
        }
    }
}
