<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Role;
use App\Cliente;
use App\Vehiculo;

class ClienteSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $cliente = array(
            "name" => "Jimeno Hortelano",
            "email" => "jhortelano@yahoo.com",
            "pwd" => "1234",
            "matricula" => "DHL3423",
            "marca" => "Pegaso",
            "modelo" => "Hércules",
            "carga_max" => "3500",
            "tipo_vehiculo" => "Lona",
        );
        self::crear_cliente($cliente);

        $cliente = array(
            "name" => "Ataulfo Sanz de Layala",
            "email" => "asanz@hotmail.org",
            "pwd" => "1234",
            "matricula" => "JKL9343",
            "marca" => "Nissan",
            "modelo" => "Atleon",
            "carga_max" => "15.000",
            "tipo_vehiculo" => "Camión",
        );
        self::crear_cliente($cliente);

        $cliente = array(
            "name" => "Luis Arévalo Yúgulo",
            "email" => "larevalo@gmail.com",
            "pwd" => "1234",
            "matricula" => "UHY3342",
            "marca" => "Man",
            "modelo" => "TGX",
            "carga_max" => "20000",
            "tipo_vehiculo" => "Camión",
        );
        self::crear_cliente($cliente);
    }

    public function crear_cliente($cliente_dict){

        $tipo_vehiculo = Vehiculo::where('tipo_vehiculo', '=', $cliente_dict['tipo_vehiculo'])->firstOrFail();
        $cliente_role = Role::where('name', '=', 'cliente')->firstOrFail();

        // New user
        $user = new User();
        $user->name = $cliente_dict['name'];
        $user->email = $cliente_dict['email'];
        $user->password = Hash::make($cliente_dict['pwd']);

        $cliente_role->users()->save($user);
        $user->role()->associate($cliente_role)->save();
        // new cliente
        $cliente = new Cliente();
        $cliente->matricula = $cliente_dict['matricula'];
        $cliente->marca = $cliente_dict['marca'];
        $cliente->modelo = $cliente_dict['modelo'];
        $cliente->carga_max = $cliente_dict['carga_max'];
        $cliente->vehiculo_id = $tipo_vehiculo->id;

        $user->cliente()->save($cliente);
        $tipo_vehiculo->clientes()->save($cliente);

        $cliente->user()->associate($user);
        $cliente->vehiculo()->associate($tipo_vehiculo)->save();
    }
}
