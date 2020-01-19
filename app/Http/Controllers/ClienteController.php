<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehiculo;
use App\Cliente;
use App\User;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();


     return view('index_clientes', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('create_clientes');
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


        $validatedData = $request->validate([
            'matricula' => 'required|alpha_num',
            'marca' => 'required|alpha_num',
            'modelo' => 'required|alpha_num',
            'carga_max' => 'required|numeric',
            'vehiculo_id' => 'required|alpha_num',
        ]);
        $tipo_vehiculo = Vehiculo::where('tipo_vehiculo','=', $validatedData['vehiculo_id'])->firstOrFail();

        $cliente = new Cliente();

        $cliente->user_id = $user->id;
        $cliente->matricula = $validatedData['matricula'];
        $cliente->marca = $validatedData['marca'];
        $cliente->modelo = $validatedData['modelo'];
        $cliente->carga_max = $validatedData['carga_max'];
        $cliente->vehiculo_id = $tipo_vehiculo['id'];

        $user->cliente()->save($cliente);

        $cliente->user()->associate($user)->save();
        
   
        return redirect('/clientes')->with('success', 'Cliente creado correctamente');
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
        $cliente = Cliente::findOrFail($id);

        return view('edit_clientes', compact('cliente'));
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
            'matricula' => 'required|alpha_num',
            'marca' => 'required|alpha_num',
            'modelo' => 'required|alpha_num',
            'carga_max' => 'required|numeric',
        ]);
        Cliente::whereId($id)->update($validatedData);

        return redirect('/clientes')->with('success', 'Cliente actualizado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return redirect('/clientes')->with('success', 'Cliente borrado correctamente');
    }
}
