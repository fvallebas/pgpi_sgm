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
        $vehiculo = new Vehiculo();
        $vehiculo->tipo_vehiculo = 'Furgoneta';
        $vehiculo->tiempo_carga = '20';
        $vehiculo->tiempo_descarga = '15';
        $vehiculo->save();

        $vehiculo = new Vehiculo();
        $vehiculo->tipo_vehiculo = 'Lona';
        $vehiculo->tiempo_carga = '40';
        $vehiculo->tiempo_descarga = '30';
        $vehiculo->save();

        $vehiculo = new Vehiculo();
        $vehiculo->tipo_vehiculo = 'Furgoneta';
        $vehiculo->tiempo_carga = '60';
        $vehiculo->tiempo_descarga = '45';
        $vehiculo->save();
    }
}
