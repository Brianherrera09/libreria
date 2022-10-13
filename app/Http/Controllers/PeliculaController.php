<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use App\Models\Genero;
use Illuminate\Http\Request;

/**
 * Class PeliculaController
 * @package App\Http\Controllers
 */
class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     // nos manda a la vista de listas de peliculas
    public function index()
    {
        $peliculas = Pelicula::paginate();

        // lista de peliculas con los datos
        return view('pelicula.index', compact('peliculas'))
            ->with('i', (request()->input('page', 1) - 1) * $peliculas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //se manda a la vista donde se crea nueva pelicula
    public function create()
    {
        $pelicula = new Pelicula();

        $generos = Genero::pluck('nombre','id');//me regresa generos utilizando nombre e id

        //te dirige a la vista donde se crea una pelicula nueva
        return view('pelicula.create', compact('pelicula','generos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

     //aqui creamos procesos que se almacenana en la BD
    public function store(Request $request)
    {
        request()->validate(Pelicula::$rules);

        $pelicula = Pelicula::create($request->all());

        return redirect()->route('peliculas.index')
            ->with('success', 'Pelicula created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelicula = Pelicula::find($id);

        return view('pelicula.show', compact('pelicula'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   //nos deja buscar la peli por el id
        $pelicula = Pelicula::find($id);
        $generos = Genero::pluck('nombre','id');

        return view('pelicula.edit', compact('pelicula','generos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Pelicula $pelicula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelicula $pelicula)
    {
        request()->validate(Pelicula::$rules);

        $pelicula->update($request->all());

        return redirect()->route('peliculas.index')
            ->with('success', 'Pelicula updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {   //elimina por id
        $pelicula = Pelicula::find($id)->delete();
            //retorna a la ruta peliculas index
        return redirect()->route('peliculas.index')
            ->with('success', 'Pelicula deleted successfully');
    }
}
