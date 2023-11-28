<?php

namespace Database\Seeders;

use App\Models\Servicio;
use Illuminate\Database\Seeder;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $servicio=new Servicio();
        $servicio->nombre= "Reinicio o cambio de batería a domicilio";
        $servicio->descripcion="Solicita tu mecánico a domicilio en Bolivia para recargar o, si es necesario, cambiar tu batería. La recarga tiene un valor de 80Bs no importa el modelo del carro.";
        $servicio->precio=80;
        $servicio->tipo="Domicilio";
        $servicio->url="https://autolab.com.co/wp-content/uploads/2021/10/unnamed-56-e1634764600142.png";
        $servicio->save();

        $servicio=new Servicio();
        $servicio->nombre= "Servicio de scanner a domicilio";
        $servicio->descripcion="Este servicio se realiza por medio de un diagnóstico automotriz o una revisión general.
        Diagnóstico: Si tu carro presenta fallas específicas o algún testigo encendido en el tablero, nuestro mecánico a domicilio lo revisa, te explica las razones y las reparaciones para solucionarlo. Si realizas la reparación con nosotros no te cobramos ese valor.";
        $servicio->precio=100;
        $servicio->tipo="Domicilio";
        $servicio->url="https://autolab.com.co/wp-content/uploads/2019/11/171219-En-qu%C3%A9-se-diferencia-el-mantenimiento-preventivo-del-correctivo_Mesa-de-trabajo-1.jpg";
        $servicio->save();

        $servicio=new Servicio();
        $servicio->nombre= "Revisión de frenos a domicilio";
        $servicio->descripcion="Quedarse sin frenos es uno de los miedos más grandes al sentarse al volante, de ahí la importancia de revisarlos constantemente.";
        $servicio->precio=35;
        $servicio->url="https://autolab.com.co/wp-content/uploads/2021/09/unnamed-34-e1634765579964.png";
        $servicio->tipo="Domicilio";
        $servicio->save();

        $servicio=new Servicio();
        $servicio->nombre= "Cambio de pastillas y discos de frenos a domicilio";
        $servicio->descripcion="Si te chillan los frenos, están largos o simplemente ya cumplieron su tiempo; agenda el cambio por unas pastillas nuevas. Los mecánicos a domicilio Autolab irán a tu casa a cambiarlas.";
        $servicio->url="https://www.msconde.com/wp-content/uploads/2019/02/como-colocar-un-disco-freno.jpg";
        $servicio->precio=40;
        $servicio->tipo="Domicilio";
        $servicio->save();

        $servicio=new Servicio();
        $servicio->nombre= "Cambio de aceite a domicilio y cambio de filtros a domicilio";
        $servicio->descripcion="Este líquido es uno de los más importantes, si no se realiza adecuadamente, la vida de tu carro puede disminuir considerablemente.";
        $servicio->url="https://electrovolkswagen.com/wp-content/uploads/2018/07/cambio-aceite.jpg";
        $servicio->precio=60;
        $servicio->tipo="Domicilio";
        $servicio->save();

        $servicio=new Servicio();
        $servicio->nombre= "Peritaje a domicilio";
        $servicio->descripcion="El mecánico a domicilio revisará exhaustivamente el estado general del vehículo para que puedas conocer su bienestar mecánico antes de tomar una decisión de compra o venta. Revisamos un total de 87 puntos.";
        $servicio->url="https://autolab.com.co/wp-content/uploads/2020/03/Header-Web.png";
        $servicio->precio=50;
        $servicio->tipo="Domicilio";
        $servicio->save();
        
        $servicio=new Servicio();
        $servicio->nombre= "Reinicio o cambio de batería a domicilio";
        $servicio->descripcion="Solicita tu mecánico a domicilio en Bolivia para recargar o, si es necesario, cambiar tu batería. La recarga tiene un valor de 80Bs no importa el modelo del carro.";
        $servicio->precio=80;
        $servicio->tipo="Taller";
        $servicio->url="https://autolab.com.co/wp-content/uploads/2021/10/unnamed-56-e1634764600142.png";
        $servicio->save();

        $servicio=new Servicio();
        $servicio->nombre= "Servicio de scanner a domicilio";
        $servicio->descripcion="Este servicio se realiza por medio de un diagnóstico automotriz o una revisión general.
        Diagnóstico: Si tu carro presenta fallas específicas o algún testigo encendido en el tablero, nuestro mecánico a domicilio lo revisa, te explica las razones y las reparaciones para solucionarlo. Si realizas la reparación con nosotros no te cobramos ese valor.";
        $servicio->precio=100;
        $servicio->tipo="Taller";
        $servicio->url="https://autolab.com.co/wp-content/uploads/2019/11/171219-En-qu%C3%A9-se-diferencia-el-mantenimiento-preventivo-del-correctivo_Mesa-de-trabajo-1.jpg";
        $servicio->save();

    }
}
