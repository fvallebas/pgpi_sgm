<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reserva;
use Illuminate\Support\Facades\Auth;
use App\Muelle;
use DateTime;
use DatePeriod;
use DateInterval;

class reservasAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservas = Reserva::all();

        return view('index_reservaAdmin', compact('reservas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_reservaAdmin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Carga cliente
        $cliente = Auth::user()->cliente;

        // Vehículo del cliente
        $vehiculo = $cliente->vehiculo;

        // Validación de datos
        $validatedData = $request->validate([
            'fecha' => 'required|max:255',
            'hora' => 'required|max:255',
            'tipo_operacion' => 'required|max:255',
        ]);
        
        //Seleccionar muelle
        $muelle = Muelle::where('tipo_operacion', $validatedData['tipo_operacion'])
                    ->inRandomOrder()
                    ->firstOrFail();
        
        if ($validatedData['tipo_operacion'] == 'Descarga'){

            $time_to_add = $vehiculo->tiempo_descarga;
        }else{
            $time_to_add = $vehiculo->tiempo_carga;
            
        }

        $time_to_add = date_create_from_format('H:i:s',$time_to_add);

        $minutos_quitar = '5';
        $minutos_anadir = $time_to_add->format('i');
        $horas_anadir = $time_to_add->format('H');

        // Fecha de entrada
        $fecha = $validatedData['fecha'].' '.$validatedData['hora'];
        $fecha_base = date_create_from_format('d/m/Y H:i', $fecha);


        $fecha_entrada = $fecha_base->sub(new DateInterval('P0Y0DT0H'. $minutos_quitar . 'M'));
        $fecha_salida = $fecha_base->add(new DateInterval('P0Y0DT' . $horas_anadir . 'H'. $minutos_anadir . 'M'));

        $reserva = new Reserva();
        $reserva->horario_entrada = $fecha_entrada;
        $reserva->horario_salida = $fecha_salida;

        $reserva->muelle()->associate($muelle);
        $reserva->cliente()->associate($cliente);

        $cliente->reservas()->save($reserva);
        $muelle->reservas()->save($reserva);

        
        
        return redirect('/reservasAdmin')->with('success', 'Reserva realizada correctamente');

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
        $reserva = Reserva::findOrFail($id);
        $reserva->delete();

        return redirect('/reservasAdmin')->with('success', 'Reserva borrada correctamente');
    
    }
}
