<?php

use App\Http\Controllers\AdminChiptuningController;
use App\Http\Controllers\AdminCursoController;
use App\Http\Controllers\AdminMarcasController;
use App\Http\Controllers\AdminMonedaController;
use App\Http\Controllers\AdminNovedadesController;
use App\Http\Controllers\AdminOfertaController;
use App\Http\Controllers\AdminPagoController;
use App\Http\Controllers\AdminTemarioController;
use App\Http\Controllers\AdminUsuarioController;
use App\Http\Controllers\ChipMarcasController;
use App\Http\Controllers\ChiptuningController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\CursoDetalleController;
use App\Http\Controllers\CursoPagoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ElectronicController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\MechanicController;
use App\Http\Controllers\MercadoPagoController;
use App\Http\Controllers\NoveltyController;
use App\Http\Controllers\PaypalCardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RepresentationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;



Route::get('/', function () {
  return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/cursos', [CursoController::class, 'index'])->name('cursos');
Route::get('/cursos/detalle/{id}', [CursoDetalleController::class, 'show'])->name('cursoDetalle.show');
Route::get('/mecanica', [MechanicController::class, 'index'])->name('mecanica');
Route::get('/electronica', [ElectronicController::class, 'index'])->name('electronica');
Route::get('/novedades', [NoveltyController::class, 'index'])->name('novedad');
Route::get('/chiptuning', [ChiptuningController::class, 'index'])->name('chiptuning');
Route::get('/chiptuning/marcas', [ChipMarcasController::class, 'index'])->name('chipMarcas');
Route::get('/representacion', [RepresentationController::class, 'index'])->name('representacion');
Route::get('/mantenimientos', [MaintenanceController::class, 'index'])->name('mantenimiento');
Route::get('/contactos', [ContactController::class, 'index'])->name('contacto');


Route::post('/envio_contacto', [ContactController::class, 'enviar'])->name('contacto.enviar');



// Mercadopago
Route::prefix('mercadopago')->group(function () {
  Route::get('/payment', [MercadoPagoController::class, 'index'])->name('mercadopago.payment.index');
  Route::post('/create_preference', [MercadoPagoController::class, 'createPreference'])->name('mercadopago.payment.createPreference');
  Route::post('/webhook', [MercadoPagoController::class, 'webhook'])->name('mercadopago.payment.webhook');
  Route::put('/make-payment', [MercadoPagoController::class, 'makePutRequest'])->name('make.payment');
  Route::get('/success', [MercadoPagoController::class, 'success'])->name('mercadopago.success');
  Route::get('/failure', [MercadoPagoController::class, 'failure'])->name('mercadopago.failure');
  Route::get('/pending', [MercadoPagoController::class, 'pending'])->name('mercadopago.pending');
});


//PayPal
Route::post('/paypal/process', [PaypalCardController::class, 'process'])->name('paypal.process');

Route::get('/thanks', function () {
  return view('pages.thanks');
})->name('thanks');

Route::get('/failed', function () {
  return view('pages.failure');
})->name('failure');

Route::middleware(['auth', 'verified'])->group(function () {

  Route::put('/profile/{user}', [ProfileController::class, 'act'])->name('profile.act');

  Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
  Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

  Route::post('/curso/detalle', [CursoDetalleController::class, 'pago'])->name('cursoDetalle.pago');
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
  Route::get('/dashboard/curso/{id}', [DashboardController::class, 'show'])->name('dashboard.show');
  Route::resource('/dashboard/curso/video', CursoPagoController::class);
  Route::resource('/dashboard/admin/cursos', AdminCursoController::class);

  Route::resource('/dashboard/admin/cursos/temario', AdminTemarioController::class);
  Route::get('/dashboard/admin/oferta', [AdminOfertaController::class, 'index'])->name('adminOferta.index');
  Route::patch('/dashboard/admin/oferta/{oferta}', [AdminOfertaController::class, 'update'])->name('adminOferta.update');
  Route::resource('/dashboard/admin/monedas', AdminMonedaController::class);
  Route::resource('/dashboard/admin/pagos', AdminPagoController::class);
  Route::resource('/dashboard/admin/usuarios', AdminUsuarioController::class);
  Route::resource('/dashboard/admin/chiptuning', AdminChiptuningController::class);
  Route::resource('/dashboard/admin/novedad', AdminNovedadesController::class);
  Route::resource('/dashboard/admin/marcas', AdminMarcasController::class);
  // Route::resource('/dashboard/test', AdminTestController::class);

});

require __DIR__ . '/auth.php';