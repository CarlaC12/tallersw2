<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\TipoController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\DetalleOrdenController;
use App\Http\Controllers\DetalleServicioTipoController;
use App\Http\Controllers\DomicilioController;
use App\Http\Controllers\MecanicoController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\PDFOrdenTrabajoController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\SalidaController;



use App\Http\Controllers\TipoServicioController;
use App\http\Controllers\MaterialController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\TipoMaterialController;

use App\Models\Factura;
use App\Models\User;

use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\CotizacionIAController;
use App\Http\Controllers\NegocioController;
use App\Http\Controllers\OrdenRepuestoController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
    // return view("reportes.mapa");
});
/* Route::get('/frontends/domicilio', function () {
    return redirect('/domicilio');
}); */
Auth::routes();
Route::get('ordens/pdf', [PDFOrdenTrabajoController::class, 'ordenesTrabajoPdf'])->name('ordens.pdf');
Route::get('ordenTrabajo/{id}/pdf', [PDFOrdenTrabajoController::class, 'ordenTrabajoPdf'])->name('orden.pdf');

Route::resource('reservas', ReservaController::class)->names('reservas');
Route::resource('domicilios', DomicilioController::class)->names('domicilios');
Route::resource('frontends', FrontendController::class)->names('frontends');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('ordens', OrdenController::class)->names('ordens');
Route::resource('vehiculos', VehiculoController::class)->names('vehiculos');
//Route::resource('tipos',TipoController::class)->names('tipos');
Route::resource('clientes', ClienteController::class)->names('clientes');
Route::resource('users', UserController::class)->names('users');
Route::resource('roles', RoleController::class)->names('roles');
Route::resource('bitacora', BitacoraController::class)->names('bitacora');

Route::resource('mecanicos', MecanicoController::class)->names('mecanicos');
Route::resource('servicios', ServicioController::class)->names('servicios');
Route::resource('entradas', EntradaController::class)->names('entradas');
Route::resource('salidas', SalidaController::class)->names('salidas');
Route::resource('tiposervicios', TipoServicioController::class)->names('tiposervicios');
Route::resource('materiales', MaterialController::class)->names('materiales');
Route::resource('tipomateriales', TipoMaterialController::class)->names('tipomateriales');
Route::resource('ordenRepuestos', OrdenRepuestoController::class)->names('ordenRepuestos');

Route::group(['prefix' => 'detalleservicios'], function () {

    Route::get('/', [DetalleServicioTipoController::class, 'index'])->name('detalle.tipo.servicios.index');
    Route::get('/create', [DetalleServicioTipoController::class, 'create'])->name('detalle.tipo.servicios.create');
    Route::post('{tipo}/', [DetalleServicioTipoController::class, 'store'])->name('detalle.tipo.servicios.store');


    Route::get('{tipo}/{id}/', [DetalleServicioTipoController::class, 'destroy'])->name('detalle.tipo.servicios.destroy');
});

Route::group(['prefix' => 'detallesorden'], function () {
    Route::get('{ordenTrabajo}/', [DetalleOrdenController::class, 'index'])->name('detalle.orden.index');
    Route::post('{ordenTrabajo}/', [DetalleOrdenController::class, 'store'])->name('detalle.orden.store');
    Route::put('{ordenTrabajo}/{id}/', [DetalleOrdenController::class, 'update'])->name('detalle.orden.update');
    Route::delete('{ordenTrabajo}/{id}/', [DetalleOrdenController::class, 'destroy'])->name('detalle.orden.destroy');
    //Prueba
    Route::get('/', [DetalleOrdenController::class, 'indexOrden'])->name('detalle.orden.trabajo.index');
});

Route::prefix('servicio-cotizacion')->group(function () {
    Route::get('/', [DetalleServicioTipoController::class, 'show'])->name('cotizacion.servicio.shop');
    Route::get('/cotizacion', [CotizacionController::class, 'quotation'])->name('cotizacion.serticio.index');
    Route::post('{servicio}/add', [CotizacionController::class, 'store'])->name('cotizacion.store');
});

Route::prefix('facturas')->group(function () {
    Route::get('/{orden}/create', [FacturaController::class, 'create'])->name('facturas.create');
    Route::get('/{factura}', [FacturaController::class, 'show'])->name('facturas.show');
    Route::post('/{orden}', [FacturaController::class, 'store'])->name('facturas.store');
    Route::get('/', [FacturaController::class, 'index'])->name('facturas.index');
});
//Reportes vehiculo
Route::get('vehiculo', [VehiculoController::class, 'indexreport'])->name('reportes.vehiculo.index');
Route::post('vehiculo/filter', [VehiculoController::class, 'filter'])->name('reportes.vehiculo.filtro');
Route::get('vehiculo/dowloadpdf/{marca?}/{combustible?}/{caja?}/', [VehiculoController::class, 'dowloadPDF'])->name('reportes.vehiculo.dowload');

//Reportes factura
Route::get('factura', [FacturaController::class, 'indexreport'])->name('reportes.factura.index');

Route::post('factura/filter', [FacturaController::class, 'filter'])->name('reportes.factura.filtro');

Route::get('factura/dowloadpdf/{moth}/{years}', [FacturaController::class, 'dowloadPDF'])->name('reportes.factura.download');

Route::get('factura/dowloadexcel/{moth}/{years}', [FacturaController::class, 'downloadExcel'])->name('reportes.factura.download.xls');

// NEGOCIO
Route::get('/negocio/reparaciones', [NegocioController::class, 'reparaciones'])->name('reparaciones');
Route::get('/negocio/beneficios', [NegocioController::class, 'beneficios'])->name('beneficios');
Route::get('/negocio/tecnicos', [NegocioController::class, 'tecnicos'])->name('tecnicos');
Route::get('/negocio/clientes', [NegocioController::class, 'clientes'])->name('clientes');

Route::resource('consultas', ConsultaController::class)->names('consultas');
Route::post('consultas', [ConsultaController::class, 'consulta_get'])->name('consultas.get');

Route::get('/notas', [FacturaController::class, 'index2'])->name('notas');
Route::get('/nota/{id}', [FacturaController::class, 'show2'])->name('notaShow2');

Route::resource('/cotizaciones', CotizacionIAController::class);