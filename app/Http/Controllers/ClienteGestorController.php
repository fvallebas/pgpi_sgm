<?php

namespace App\Http\Controllers;
use App\Vehiculo;
use App\Cliente;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteGestorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();


     return view('index_clientes_gestor', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lista_vehiculos = Vehiculo::all();

        return view ('create_clientes_gestor', compact('lista_vehiculos'));
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
        $cliente = Role::where('name', '=', 'cliente')->firstOrFail();

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|alpha_num',
        ]);
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);

        $cliente->users()->save($user);
        $user->role()->associate($cliente)->save();


        $validatedData = $request->validate([
            'matricula' => 'required|alpha_num',
            'marca' => 'required|alpha_num',
            'modelo' => 'required|alpha_num',
            'carga_max' => 'required|numeric',
            'vehiculo_id' => 'required|alpha_num',
        ]);
        $tipo_vehiculo = Vehiculo::where('id','=', $validatedData['vehiculo_id'])->firstOrFail();

        $cliente = new Cliente();

        $cliente->user_id = $user->id;
        $cliente->matricula = $validatedData['matricula'];
        $cliente->marca = $validatedData['marca'];
        $cliente->modelo = $validatedData['modelo'];
        $cliente->carga_max = $validatedData['carga_max'];
        $cliente->vehiculo_id = $tipo_vehiculo['id'];

        $user->cliente()->save($cliente);
        $cliente->user()->associate($user)->save();

        $tipo_vehiculo->clientes()->save($cliente);
        $cliente->vehiculo()->associate($tipo_vehiculo)->save();
        
   
        return redirect('/clienteGestor')->with('success', 'Cliente creado correctamente');
    
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
        $lista_vehiculos = Vehiculo::all();
        $cliente = Cliente::findOrFail($id);

        return view('edit_clientes_gestor', compact('cliente'),compact('lista_vehiculos'));

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
        $cliente = Cliente::whereId($id)->firstOrFail();
        $user = User::whereId($cliente->user_id);

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
        ]);
        $user->update($validatedData);

        $validatedData = $request->validate([
            'matricula' => 'required|alpha_num',
            'marca' => 'required|alpha_num',
            'modelo' => 'required|alpha_num',
            'carga_max' => 'required|numeric',
            'vehiculo_id' => 'required|alpha_num',
        ]);
        $cliente->update($validatedData);

        return redirect('/clienteGestor')->with('success', 'Cliente actualizado correctamente');

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
        $user = User::findOrFail($cliente->user_id);
        

        $user->delete();
        $cliente->delete();

        return redirect('/clienteGestor')->with('success', 'Cliente borrado correctamente');
    
    }
}
