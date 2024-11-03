<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EstudiantesController extends Controller
{
 protected static $api ="http://localhost/quinto/API.php";
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estudiantes = Http::GET(static::$api);
        $estudiantesArray = $estudiantes ->json();
        return view('estudiantesInicio',compact('estudiantesArray'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('crearEstudiante');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $response = Http::asForm() -> post (static::$api,[
            'cedula'=>$request->input('cedula'),
            'nombre'=>$request->input('nombre'),
            'apellido'=>$request->input('apellido'),
            'direccion'=>$request->input('direccion'),
            'telefono'=>$request->input('telefono')

        ]);
        return redirect('/estudiantes');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $cedula)
    {
        $estudiantes = Http::GET(static::$api . "?cedula=" . $cedula);
        $estudiantesArray = $estudiantes->json();
        return view('mostrar', compact('estudiantesArray'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $cedula)
    {
        $estudiantes=Http::GET (static::$api)->json();
        $estudiante= collect($estudiantes)->firstWhere('cedula',$cedula);
        return view ('edit',with(['estudiante'=>$estudiante]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    
    {
        
        $cedula=$request->input('cedula');
        $nombre=$request->input('nombre');
        $apellido=$request->input('apellido');
        $direccion=$request->input('direccion');
        $telefono=$request->input('telefono');
        $data=[
            'cedula'=> $cedula,
            'nombre'=> $nombre,
            'apellido'=> $apellido,
            'direccion'=> $direccion,
            'telefono'=> $telefono
        ];
        $response = Http::asForm() -> put (static::$api,$data);
        return redirect('/estudiantes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $cedula)
    {
        $response=Http::delete(static::$api."?cedula=".$cedula);
        return redirect('/estudiantes');
    }
}
