<?php

namespace Database\Seeders;
use App\Models\mecanico;
use Illuminate\Database\Seeder;

class MecanicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mecanico=New mecanico();
        $mecanico->ci='9648313';
        $mecanico->nombre='Elian Huanca';
        $mecanico->email='elian_huanca@hotmail.com';
        $mecanico->genero='Masculino';
        $mecanico->celular='73143558';
        $mecanico->fecha='2000/05/22';
        $mecanico->especialidad='Chaperio';
        $mecanico->save();

        $mecanico=New mecanico();
        $mecanico->ci='1258750';
        $mecanico->nombre='Javier Vidal';
        $mecanico->genero='Masculino';
        $mecanico->celular='72170945';
        $mecanico->email='Javi123@hotmail.com';
        $mecanico->fecha='2000/06/10';
        $mecanico->especialidad='Chaperio';
        $mecanico->save();

        $mecanico=New mecanico();
        $mecanico->ci='3128491';
        $mecanico->nombre='Fernando Rios';
        $mecanico->genero='Masculino';
        $mecanico->celular='70972450';
        $mecanico->email='Fercho95@hotmail.com';
        $mecanico->fecha='1995/01/16';
        $mecanico->especialidad='Hidraulica';
        $mecanico->save();

        $mecanico=New mecanico();
        $mecanico->ci='1085479';
        $mecanico->nombre='Adriana Sanabria';
        $mecanico->genero='Femenino';
        $mecanico->celular='76627240';
        $mecanico->email='AELS182000@hotmail.com';
        $mecanico->fecha='2000/08/01';
        $mecanico->especialidad='Pintura';
        $mecanico->save();

        $mecanico=New mecanico();
        $mecanico->ci='3501789';
        $mecanico->nombre='Adela Gutierrez';
        $mecanico->genero= 'Femenino';
        $mecanico->celular='78068089';
        $mecanico->email='AdelaGu99@hotmail.com';
        $mecanico->fecha='1999/10/29';
        $mecanico->especialidad='Mecanico';
        $mecanico->save();
    }
}
