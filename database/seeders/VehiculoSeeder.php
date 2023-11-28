<?php

namespace Database\Seeders;

use App\Models\vehiculo;
use Illuminate\Database\Seeder;

class VehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $auto=New vehiculo();
        $auto->matricula='9521XPC';
        $auto->marca='Toyota';
        $auto->modelo='LandcruiserPrado';
        $auto->year='2020';
        $auto->combustible='Gasolina';
        $auto->caja='Automatica';
        $auto->color='Negro';
        $auto->tipo='Automovil';
        $auto->cliente_id=2;
        $auto->save();

        $auto=New vehiculo();
        $auto->matricula='3133LCD';
        $auto->marca='Toyota';
        $auto->modelo='Caldina';
        $auto->year='2015';
        $auto->combustible='Gas';
        $auto->caja='Mecanica';
        $auto->color='Negro';
        $auto->tipo='Automovil';
        $auto->cliente_id=2;
        $auto->save();

        $auto=New vehiculo();
        $auto->matricula='6119FGE';
        $auto->marca='Suzuki';
        $auto->modelo='vitara';
        $auto->year='2015';
        $auto->combustible='Gasolina';
        $auto->caja='Automatica';
        $auto->color='gris';
        $auto->tipo='Automovil';
        $auto->cliente_id = 2;
        $auto->save();

        $auto=New vehiculo();
        $auto->matricula='5887NKG';
        $auto->marca='Ford';
        $auto->modelo='Mustang';
        $auto->year='2019';
        $auto->combustible='Gasolina';
        $auto->caja='manual';
        $auto->color='azul';
        $auto->tipo='Automovil';
        $auto->cliente_id = 2;
        $auto->save();

        $auto=New vehiculo();
        $auto->matricula='8431QBF';
        $auto->marca='Mazda';
        $auto->modelo='CX-5';
        $auto->year='2018';
        $auto->combustible='Gasolina';
        $auto->caja='Automatica';
        $auto->color='rojo';
        $auto->tipo='Automovil';
        $auto->cliente_id = 2;
        $auto->save();

        $auto=New vehiculo();
        $auto->matricula='1849GGT';
        $auto->marca='Kia';
        $auto->modelo='sportage';
        $auto->year='2020';
        $auto->combustible='Gasolina';
        $auto->caja='Automatica';
        $auto->color='blanco';
        $auto->tipo='Automovil';
        $auto->cliente_id = 1;
        $auto->save();

        $auto=New vehiculo();
        $auto->matricula='4587BBF';
        $auto->marca='Hyundai';
        $auto->modelo='Tucson';
        $auto->year='2018';
        $auto->combustible='Gasolina';
        $auto->caja='Automatica';
        $auto->color='negro';
        $auto->tipo='Automovil';
        $auto->cliente_id = 1;
        $auto->save();
    }
}
