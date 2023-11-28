<?php

namespace Database\Seeders;
use App\Models\TipoMaterial;
use Illuminate\Database\Seeder;

class TipoMaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipomaterial=New TipoMaterial();
        $tipomaterial->id=1;
        $tipomaterial->descripción='Herramienta de mano';
        $tipomaterial->save();

        $tipomaterial=New TipoMaterial();
        $tipomaterial->id=2;
        $tipomaterial->descripción='Herramientas Hidráulicas';
        $tipomaterial->save();
        
        $tipomaterial=New TipoMaterial();
        $tipomaterial->id=3;
        $tipomaterial->descripción='Herramientas Neumáticas';
        $tipomaterial->save();

        $tipomaterial=New TipoMaterial();
        $tipomaterial->id=4;
        $tipomaterial->descripción='Herramientas de diagnóstico';
        $tipomaterial->save();

        $tipomaterial=New TipoMaterial();
        $tipomaterial->id=5;
        $tipomaterial->descripción='Herramientas de corte';
        $tipomaterial->save();

        $tipomaterial=New TipoMaterial();
        $tipomaterial->id=6;
        $tipomaterial->descripción='Herramientas de medición';
        $tipomaterial->save();
    
    }
}
