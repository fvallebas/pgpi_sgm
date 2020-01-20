<?php

use Illuminate\Database\Seeder;
use App\Muelle;

class MuelleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i <= 10; $i++){
            self::create_muelles('Carga');
            self::create_muelles('Descarga');
        }
        
    }

    private function create_muelles($tipo_operacion){

        $muelle = new Muelle();
        $muelle->tipo_operacion = $tipo_operacion;
        $muelle->save();
    }
    

}
