<?php

namespace Database\Seeders;

use App\Models\cliente;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cliente=New cliente();
        $cliente->ci='9648313';
        $cliente->nombre='martin';
        $cliente->genero='Masculino';
        $cliente->celular='73143558';
        $cliente->email='elian_huanca@hotmail.com';
        $cliente->fecha='2000/05/22';
        $cliente->user_id=3;
        $cliente->save();

        $cliente=New cliente();
        $cliente->ci='1258750';
        $cliente->nombre='luis';
        $cliente->genero='Masculino';
        $cliente->celular='72170945';
        $cliente->email='Javi123@hotmail.com';
        $cliente->fecha='2000/06/10';
        $cliente->user_id=4;
        $cliente->save();

        /* $cliente=New cliente();
        $cliente->ci='3128491';
        $cliente->nombre='Fernando Rios';
        $cliente->genero='Masculino';
        $cliente->celular='70972450';
        $cliente->email='Fercho95@hotmail.com';
        $cliente->fecha='1995/01/16';
        $cliente->save();

        $cliente=New cliente();
        $cliente->ci='1085479';
        $cliente->nombre='Adriana Sanabria';
        $cliente->genero='Femenino';
        $cliente->celular='76627240';
        $cliente->email='AELS182000@hotmail.com';
        $cliente->fecha='2000/08/01';
        $cliente->save();

        $cliente=New cliente();
        $cliente->ci='3501789';
        $cliente->nombre='Adela Gutierrez';
        $cliente->genero= 'Femenino';
        $cliente->celular='78068089';
        $cliente->email='AdelaGu99@hotmail.com';
        $cliente->fecha='1999/10/29';
        $cliente->save(); */
    }
}