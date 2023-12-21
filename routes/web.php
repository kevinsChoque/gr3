<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PortalController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CotxitmController;
use App\Http\Controllers\UnidadMedidaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\SuspensionController;
use App\Http\Controllers\RecotizacionController;
use App\Http\Controllers\LoginProveedorController;
// portal
use App\Http\Controllers\PortalProveedorController;
use App\Http\Controllers\PaCotizacionController;
use App\Http\Controllers\PaCotRecProController;
use App\Http\Controllers\PaProveedorController;
use App\Http\Controllers\PostulacionesController;
use App\Http\Controllers\DetalleprocotController;
use App\Http\Controllers\FilesCotizacionController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\CotLlenadaController;
use App\Http\Controllers\FormatosController;



use App\Http\Middleware\MDAdministrador;

Route::middleware([MDAdministrador::class])->group(function () {
	// home
	Route::get('home/home',[HomeController::class, 'actionHome']);
});

// Route::get('/', function () {
//     return view('welcome');
// });
// portal
Route::get('/',[PortalController::class, 'actionPortal']);
// login
Route::get('login/login',[LoginController::class, 'actionLogin']);
Route::get('loginProveedor/loginProveedor',[LoginProveedorController::class, 'actLogin']);
Route::post('login/sigin',[LoginController::class, 'sigin']);
Route::post('login/siginpro',[LoginController::class, 'siginpro']);
Route::get('login/logout',[LoginController::class, 'logout']);
Route::get('loginProveedor/logoutPro',[LoginController::class, 'logoutPro']);

// proveedor
Route::get('proveedor', function () {return view('proveedor.proveedor');});
// Route::get('proveedor/registrar',[ProveedorController::class, 'actRegistrar']);
Route::post('proveedor/guardar',[ProveedorController::class, 'actGuardar']);
Route::get('proveedor/listar',[ProveedorController::class, 'actListar']);
Route::post('proveedor/eliminar',[ProveedorController::class, 'actEliminar']);
Route::post('proveedor/editar',[ProveedorController::class, 'actEditar']);
Route::post('proveedor/guardarCambios',[ProveedorController::class, 'actGuardarCambios']);
// cotizacion
Route::get('cotizacion/registrar', function () {return view('cotizacion.registrar');});
Route::get('cotizacion/ver', function () {return view('cotizacion.ver');});
Route::get('cotizacion/editar', function () {return view('cotizacion.editar');});
Route::get('cotizacion/addItems', function () {return view('cotizacion.addItems');});

Route::post('cotizacion/guardar',[CotizacionController::class, 'actGurdar']);
Route::get('cotizacion/listar',[CotizacionController::class, 'actListar']);
Route::post('cotizacion/eliminar',[CotizacionController::class, 'actEliminar']);
Route::post('cotizacion/show',[CotizacionController::class, 'actShow']);
Route::post('cotizacion/guardarCambios',[CotizacionController::class, 'actGuardarCambios']);
Route::post('cotizacion/changeEstadoCotizacion',[CotizacionController::class, 'actChangeEstadoCotizacion']);
Route::post('cotizacion/showCotizacion',[CotizacionController::class, 'actShowCotizacion']);
// - interesante manejo de file
// Route::get('cotizacion/archivo/{nombreArchivo}', 'CotizacionController@verArchivo')->name('ver-archivo');
Route::get('cotizacion/archivo/{nombreArchivo?}',[CotizacionController::class, 'verArchivo'])->name('ver-archivo');
// -

// items
Route::post('item/guardar',[ItemController::class, 'actGurdar']);
Route::get('item/listar',[ItemController::class, 'actListar']);
// items x cotizacion
Route::post('cotxitm/guardar',[CotxitmController::class, 'actGuardar']);
Route::post('cotxitm/eliminar',[CotxitmController::class, 'actEliminar']);
Route::post('cotxitm/changeCant',[CotxitmController::class, 'actChangeCant']);
Route::post('cotxitm/changeUm',[CotxitmController::class, 'actChangeUm']);
Route::post('cotxitm/loadSegunCotizacion',[CotxitmController::class, 'actLoadSegunCotizacion']);

// unidad de medida
Route::get('unidadMedida/listar',[UnidadMedidaController::class, 'actListar']);
// usuario
Route::get('usuario', function () {return view('usuario.usuario');});

Route::post('usuario/guardar',[UsuarioController::class, 'actGuardar']);
Route::get('usuario/listar',[UsuarioController::class, 'actListar']);
Route::post('usuario/eliminar',[UsuarioController::class, 'actEliminar']);
Route::post('usuario/editar',[UsuarioController::class, 'actEditar']);
Route::post('usuario/guardarCambios',[UsuarioController::class, 'actGuardarCambios']);
// suspension
Route::post('suspension/guardar',[SuspensionController::class, 'actGuardar']);
// recotizacion
Route::post('recotizacion/guardar',[RecotizacionController::class, 'actGuardar']);
// postulaciones
Route::get('postulaciones/ver', function () {return view('postulacion.ver');});
Route::get('postulacion/postulaciones', function () {return view('postulacion.postulaciones');});
Route::get('postulaciones/listar',[PostulacionesController::class, 'actListar']);
Route::post('postulaciones/showPostulantes',[PostulacionesController::class, 'actShowPostulantes']);

// -------------------------------------------------------------------------------
// -------------------------------------------------------------------------------
// -------------------------------------------------------------------------------
// PORTAL-------------------------------------------------------------------------------
// -------------------------------------------------------------------------------
// -------------------------------------------------------------------------------
// -------------------------------------------------------------------------------
// proveedor
Route::get('portal/proveedor/registrar', function () {return view('portal.proveedor.registrar');});
Route::post('portal/proveedor/guardar',[PortalProveedorController::class, 'actGuardar']);
// panel administrativo del proveedor
// home
Route::get('panelAdm/home/home', function () {return view('panelAdm.home.home');});
// cotizacion
Route::get('panelAdm/paCotizacion/cotizacionesActivas', function () {return view('panelAdm.cotizacion.cotizacionesActivas');});
Route::get('panelAdm/paCotizacion/cotizar', function () {return view('panelAdm.cotizacion.cotizar');});
Route::get('panelAdm/paCotizacion/misCotizaciones', function () {return view('panelAdm.cotizacion.misCotizaciones');});
Route::get('panelAdm/paCotizacion/listar',[PaCotizacionController::class, 'actListar']);
Route::post('panelAdm/paCotizacion/search',[PaCotizacionController::class, 'actSearch']);
// Route::post('panelAdm/paCotizacion/searchMisCot',[PaCotizacionController::class, 'searchMisCot']);
Route::post('panelAdm/paCotizacion/showProCot',[PaCotizacionController::class, 'actShowProCot']);
// paCotRecPro asociada a las cotizaciones y recotizaciones con los proveedores
Route::post('panelAdm/paCotRecPro/guardar',[PaCotRecProController::class, 'actGuardar']);
Route::post('panelAdm/paCotRecPro/listar',[PaCotRecProController::class, 'actListar']);
Route::post('panelAdm/paCotRecPro/search',[PaCotRecProController::class, 'actSearch']);//---------------------------------

Route::post('panelAdm/paCotRecPro/subirArchivo',[PaCotRecProController::class, 'actSubirArchivo']);
Route::post('panelAdm/paCotRecPro/generarCot',[PaCotRecProController::class, 'actGenerarCot']);

Route::get('panelAdm/paCotRecPro/{idPro?}/{idCrp?}/{nombreArchivo?}',[PaCotRecProController::class, 'verArchivo'])->name('cotRecPro-archivo');
// proveedor
Route::get('panelAdm/paProveedor/datos', function () {return view('panelAdm.proveedor.datos');});
Route::get('panelAdm/paProveedor/formatos', function () {return view('panelAdm.proveedor.formatos');});
Route::get('panelAdm/paProveedor/changePassword', function () {return view('panelAdm.proveedor.changePassword');});
Route::post('panelAdm/paProveedor/guardar',[PaProveedorController::class, 'actGuardar']);
Route::post('panelAdm/paProveedor/savePassword',[PaProveedorController::class, 'actSavePassword']);
// detalle de las cotizaciones que envian

Route::get('panelAdm/detalleprocot/{nombreArchivo?}',[DetalleprocotController::class, 'verArchivo'])->name('detalle-archivo');
// archivos de cotizacion
Route::get('panelAdm/declaracionJurada',[FilesCotizacionController::class, 'declaracionJurada'])->name('declaracion-jurada');
Route::get('panelAdm/cci',[FilesCotizacionController::class, 'cci'])->name('cci');
Route::get('panelAdm/cotizacion',[FilesCotizacionController::class, 'cotizacion'])->name('cotizacion');
Route::get('panelAdm/anexo5',[FilesCotizacionController::class, 'anexo5'])->name('anexo5');
// pdf de cotizacion llenada
Route::get('panelAdm/pdfCot',[PdfController::class, 'cotizacion'])->name('pdf-cotizacion');
Route::get('panelAdm/cotLlenada',[CotLlenadaController::class, 'cotizacion'])->name('cotizacion-llenada');
// formatos
Route::get('panelAdm/formatos/file/{nombreArchivo?}',[FormatosController::class, 'formatosFile'])->name('formatos-file');
// Route::get('cotizacion/archivo/{nombreArchivo?}',[CotizacionController::class, 'verArchivo'])->name('ver-archivo');
Route::get('panelAdm/formatos/saveCciDel',[FormatosController::class, 'actSaveCciDel'])->name('saveCciDel');
Route::get('panelAdm/formatos/saveDjDel',[FormatosController::class, 'actSaveDjDel'])->name('saveDjDel');
Route::get('panelAdm/formatos/saveAnexo5Del',[FormatosController::class, 'actSaveAnexo5Del'])->name('saveAnexo5Del');
// saveCciDel

