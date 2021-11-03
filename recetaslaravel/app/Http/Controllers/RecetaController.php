<?php

namespace App\Http\Controllers;

use App\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
//use Illuminate\Support\DB;

class RecetaController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('recetas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ctaegorias = DB::table('categoria_recetas')->get()->pluck('nombre','id') ;
        return view('recetas.create')->with('categorias',$ctaegorias);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = request()->validate([
            'titulo'=>'required|min:6',
            'categoria'=>'required',
            'preparacion'=>'required',
            'Ingredientes'=>'required',
            'imagen'=>'required|image',

        ]);
        $ruta_imagen= $request['imagen']->store('upload-recetas','public');
       // $data = $request->all();

       //$img=Image::make(public_path("storage/app/public/{$ruta_imagen}"))->fit(1000,550);
       //$img->save();

        DB::table('recetas')->insert([
            'titulo'=>$data['titulo'],
            'categoria_id'=>$data['categoria'],
            'preparacion'=>$data['preparacion'],
            'Ingredientes'=>$data['Ingredientes'],
            'user_id'=>Auth::user()->id,
            'imagen'=>$ruta_imagen,

            
        ]);
        
        return  redirect()->action('RecetaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {
        //
    }
}
