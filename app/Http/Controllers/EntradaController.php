<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\EntradaSalida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

//use Spatie\Activitylog\Models\Activity;



class EntradaController extends Controller
{
    public $API_FILE;
    
    public function __construct() {
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
        return view('entradas.index', compact('entradas'));
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
            if ($request->hasFile('files')) {
                $files = $request->file('files');
                $url = "{$this->API_FILE}/api/archivo";
                foreach ($files as $file) {
                    $response = Http::attach(
                        'file', // Nombre del archivo en el formulario
                        file_get_contents($file->path()),
                        $file->getClientOriginalName()
                    )->post($url, [
                        'foreign_id' => $entrada->id // Agrega la otra variable al cuerpo de la solicitud
                    ]);
                }
            }
        } catch (\Throwable $th) {
            
        }
        /* activity()->useLog('Entrada')->log('Nuevo')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = Entrada::all()->last()->id;
        $lastActivity->description = request()->ip();
        $lastActivity->save(); */
        return redirect()->route('entradas.index');


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
        //
    }
}