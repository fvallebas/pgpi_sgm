<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Muelle;

class MuelleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $muelles = Muelle::all();

     return view('index_muelles', compact('muelles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_muelles');
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
            'tipo_muelles_id' => 'required|numeric',

        ]);
        $muelle = Muelle::create($validatedData);
   
        return redirect('/muelles')->with('success', 'Muelle guardado correctamente');
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
        $muelle = Muelle::findOrFail($id);

        return view('edit_muelles', compact('muelle'));
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
            'tipo_muelles_id' => 'required|numeric',
        ]);
        Muelle::whereId($id)->update($validatedData);

        return redirect('/muelles')->with('success', 'Muelle actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $muelle = Muelle::findOrFail($id);
        $muelle->delete();

        return redirect('/muelles')->with('success', 'Muelle borrado correctamente');
    }
}
