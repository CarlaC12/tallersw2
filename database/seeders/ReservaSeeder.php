<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reserva;


class ReservaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //id = 1
        $reserva = new Reserva();
        $reserva->fecha = '2022-05-22';
        $reserva->hora = '12:00:00';
        $reserva->tipo = 'Domicilio';
        $reserva->estado = 'Confirmado';
        $reserva->longitud = '';
        $reserva->latitud = '';
        $reserva->vehiculo_id = 7;
        $reserva->cliente_id = 1;
        $reserva->save();

        //id = 2
        $reserva = new Reserva();
        $reserva->fecha = '2022-05-22';
        $reserva->hora = '12:00:00';
        $reserva->tipo = 'Domicilio';
        $reserva->estado = 'Confirmado';
        $reserva->longitud = '';
        $reserva->latitud = '';
        $reserva->vehiculo_id = 6;
        $reserva->cliente_id = 1;
        $reserva->save();

        //id = 3
        $reserva = new Reserva();
        $reserva->fecha = '2022-05-22';
        $reserva->hora = '12:00:00';
        $reserva->tipo = 'Domicilio';
        $reserva->estado = 'Confirmado';
        $reserva->longitud = '';
        $reserva->latitud = '';
        $reserva->vehiculo_id = 1;
        $reserva->cliente_id = 2;
        $reserva->save();

        //id = 4
        $reserva = new Reserva();
        $reserva->fecha = '2022-05-22';
        $reserva->hora = '12:00:00';
        $reserva->tipo = 'Domicilio';
        $reserva->estado = 'Confirmado';
        $reserva->longitud = '';
        $reserva->latitud = '';
        $reserva->vehiculo_id = 2;
        $reserva->cliente_id = 2;
        $reserva->save();
        
        //id = 5
        $reserva = new Reserva();
        $reserva->fecha = '2022-05-22';
        $reserva->hora = '12:00:00';
        $reserva->tipo = 'Domicilio';
        $reserva->estado = 'Confirmado';
        $reserva->longitud = '';
        $reserva->latitud = '';
        $reserva->vehiculo_id = 3;
        $reserva->cliente_id = 2;
        $reserva->save();
    }
}
