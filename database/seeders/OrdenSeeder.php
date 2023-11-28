<?php

namespace Database\Seeders;

use App\Models\orden;
use Illuminate\Database\Seeder;

class OrdenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orden = new orden();
        $orden->estado = 'Terminado';
        $orden->descripcion = 'Mantenimiento De Sistema De Transmision';
        $orden->fechai = '2021/11/10';
        $orden->fechaf = '2021/11/15';
        $orden->mecanico_id = 1;
        //$orden->reserva_id = 1;
        $orden->save();

        $orden = new orden();
        $orden->estado = 'Terminado';
        $orden->descripcion = 'Mantenimiento De Sistema De Compartimento';
        $orden->fechai = '2021/11/13';
        $orden->fechaf = '2021/11/18';
        $orden->mecanico_id = 2;
        //$orden->reserva_id = 2;
        $orden->save();

        $orden = new orden();
        $orden->estado = 'Terminado';
        $orden->descripcion = 'Revision De Funcionamiento De Frenos';
        $orden->fechai = '2021/11/16';
        $orden->fechaf = '2021/11/19';
        $orden->mecanico_id = 3;
        //$orden->reserva_id = 3;
        $orden->save();

        $orden = new orden();
        $orden->estado = 'En Proceso';
        $orden->descripcion = 'Verificar el nivel de aceite de caja de cambios';
        $orden->fechai = '2021/11/23';
        $orden->fechaf = '2021/11/15';

        $orden->mecanico_id = 4;
        //$orden->reserva_id = 4;
        $orden->save();

        $orden = new orden();
        $orden->estado = 'En Proceso';
        $orden->descripcion = 'Mantenimiento De Sistema De Transmision';
        $orden->fechai = '2021/11/24';
        $orden->fechaf = '2021/11/15';

        $orden->mecanico_id = 5;
        //$orden->reserva_id = 5;
        $orden->save();
    }
}
