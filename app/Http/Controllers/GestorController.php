<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gestor;

class GestorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gestores = Gestor::all();

     return view('index_gestores', compact('gestores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_gestores');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|numeric',
            'horario' => 'required|alpha_num',
        ]);
        $gestor = Gestor::create($validatedData);

        return redirect('/gestores')->with('success', 'Gestor creado correctamente');
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
        $gestor = Gestor::findOrFail($id);

    return view('edit_gestores', compact('gestor'));
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
        $validatedData = $request->validate([
            'horario' => 'required|alpha_num',
        ]);
        Gestor::whereId($id)->update($validatedData);

        return redirect('/gestores')->with('success', 'Gestor actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gestor = Gestor::findOrFail($id);
        $gestor->delete();

        return redirect('/gestores')->with('success', 'Gestor borrado correctamente');
    }
}
