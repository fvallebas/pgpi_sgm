<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gestor;
use App\User;
use Illuminate\Support\Facades\Hash;

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
        $user = new User();

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|alpha_num',
        ]);
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->save();


        $validatedData = $request->validate([
            'horario' => 'required|alpha_num',
        ]);
        //$gestor = Gestor::create($validatedData);

        $gestor = new Gestor();

        $gestor->user_id = $user->id;
        $gestor->horario = $validatedData['horario'];

        $user->gestor()->save($gestor);
        $gestor->user()->associate($user)->save();


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
        $gestor = Gestor::whereId($id)->firstOrFail();
        $user = User::whereId($gestor->user_id);

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
        ]);
        $user->update($validatedData);

        $validatedData = $request->validate([
            'horario' => 'required|alpha_num',
        ]);
        $gestor->update($validatedData);
        //Gestor::whereId($id)->update($validatedData);

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
        $user = User::findOrFail($gestor->user_id);

        $user->delete();
        $gestor->delete();

        

        return redirect('/gestores')->with('success', 'Gestor borrado correctamente');
    }
}
