<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gestor;

class GestorController extends Controller
{
    public function index()
    {
        $gestores = Gestor::all();
        return view ('gestores');
    }
    public function create()
    {
        return view('crear_gestores');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            

            'horario' => 'required|max:255',
        ]);
        $gestores = Gestores::create($validatedData);

        return redirect('/gestores')->with('success', 'El gestor ha sido creado correctamente');
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

