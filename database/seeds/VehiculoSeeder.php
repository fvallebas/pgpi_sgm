<?php

use Illuminate\Database\Seeder;
use App\Vehiculo;

class VehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $carga = new DateTime();
        $carga->setTime(0, 20, 0);
        $descarga = new DateTime();
        $descarga->setTime(0, 15, 0);

        $vehiculo = new Vehiculo();
        $vehiculo->tipo_vehiculo = 'Furgoneta';
        $vehiculo->tiempo_carga = $carga;
        $vehiculo->tiempo_descarga = $descarga;
        $vehiculo->save();


        $carga = new DateTime();
        $carga->setTime(0, 40, 0);
        $descarga = new DateTime();
        $descarga->setTime(0, 30, 0);

        $vehiculo = new Vehiculo();
        $vehiculo->tipo_vehiculo = 'Lona';
        $vehiculo->tiempo_carga = $carga;
        $vehiculo->tiempo_descarga = $descarga;
        $vehiculo->save();


        $carga = new DateTime();
        $carga->setTime(0, 60, 0);
        $descarga = new DateTime();
        $descarga->setTime(0, 45, 0);

        $vehiculo = new Vehiculo();
        $vehiculo->tipo_vehiculo = 'Camión';
        $vehiculo->tiempo_carga = $carga;
        $vehiculo->tiempo_descarga = $descarga;
        $vehiculo->save();
    }
}
