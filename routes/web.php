<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	 Route::get('map', function () {return view('pages.maps');})->name('map');
	 Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	 Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::get('/relacionFlujos', function () {
    // return view('auth.login');
    return view('relacionFlujos.relacionFlujos');
});
Route::prefix('/')->group(function () {
    Route::resource('Opeinternas', 'CotiController')->name('CotiController@index', 'Opeinternas');
});
Route::prefix('/')->group(function () {
    Route::resource('operaciones', 'GgtoController')->name('GgtoController@index', 'operaciones');
});
Route::post('/comic', function () {
    // $contents = SSH::run(['mkdir /dcantv/directorio12',
    //     ]);
    return request()->all();
});

Route::get('/elementoRed', function () {
    // return view('auth.login');
    return view('elementoRed.elementoRed');
});
Route::get('/elementoDetalle', function () {
    // return view('auth.login');
    return view('elementoDetalle.elementoDetalle');
});
Route::get('/servicio', function () {
    // return view('auth.login');
    return view('servicios.servicio');
});
Route::prefix('proveedor')->group(function () {
    Route::resource('/', 'ProveedorController')->name('ProveedorController@index', 'proveedor');
    Route::get('/', 'ProveedorController@show');
    Route::get('/all', 'ProveedorController@all')->name('proveedors');
});

Route::prefix('/')->group(function () {
    Route::resource('central', 'CentralController')->name('CentralController@index', 'central'); //api
    Route::get('/centrals', 'CentralController@mostrar');
});
Route::prefix('/')->group(function () {
    Route::resource('aprovision', OltController::class)->names('aprovision');
    Route::get('/tipos','OltController@optionTipo');
    // Route::resource('aprovision', 'OltController')->name('OltController@index','aprovision');
    Route::get('/aprovisions', 'OltController@mostrar');
    // Route::get('/aprovisiones', 'OltController@mostrar2');
});
Route::prefix('/')->group(function () {
    Route::resource('TargetPort', 'TargetPortController')->name('TargetPortController@index','TargetPort');
    Route::get('/TargetPorts', 'TargetPortController@mostrar');
});
Route::prefix('/')->group(function () {
    Route::resource('ont', 'OntController')->name('OntController@index', 'ont');
    Route::get('/onts', 'OntController@mostrar');
});







Route::prefix('/')->group(function () {
    Route::resource('product', 'ProductController')->name('ProductController@index', 'product'); // api
    Route::get('/products', 'ProductController@mostrar');
});
Route::prefix('/')->group(function () {
    Route::resource('service', 'ServiceProfileController')->name('ServiceProfileController@index','service');
    Route::get('/services', 'ServiceProfileController@mostrar');
});
Route::prefix('/')->group(function () {
    Route::resource('online', 'OnlineProfileController')->name('OnlineProfileController@index','online');
    Route::get('/onlines', 'OnlineProfileController@mostrar');
});
Route::prefix('/')->group(function () {
    Route::resource('planes', 'PlanController')->name('PlanController@all', 'planes'); //api
    Route::get('/plans', 'PlanController@mostrar');
});








Route::prefix('/')->group(function () {
    Route::resource('sfp', SfpController::class)->name('SfpController@index', 'sfp'); //api
    Route::get('/sfps', 'SfpController@mostrar');

});
Route::prefix('/')->group(function () {
    Route::resource('tipo', 'TipoController')->name('TipoController@index', 'tipo'); //api

});








// Route::prefix('ordenes')->group(function () {
    Route::resource('ordenes', 'OrdenController')->name('OrdenController@index', 'ordenes'); // agregar campos cedula y numero de servicio
    Route::get('ordenes/all', 'OrdenController@all');

// });
// Route::resource('ordenes', 'OrdenController')->name('OrdenController@index', 'ordenes');






Route::resource('install', 'InstallController')->name('InstallController@index','install');
// Route::resource('sales', 'SaleController')->name('SaleController@index','sales');
Route::resource('config', 'ConfiguraController')->name('ConfiguraController@index', 'config')->middleware('permission:config.index');
// Route::resource('ZonaSale', 'ZonaSaleController')->name('ZonaSaleController@store', 'ZonaSale');
// Route::post('ZonaSale', 'ZonaSaleController@store')->name('ZonaSale');






Route::get('/installs', 'InstallController@mostrar');



Route::post('/apiProduct', 'ApiOrdenController@store');



Route::get('ciudades', 'SaleController@getCiudad');
Route::get('/central/{{}}/ciudadesedit', 'SaleController@getCiudad');
Route::get('municipios', 'SaleController@getMunicipio');
Route::get('parroquias', 'SaleController@getParroquia');
Route::get('urbanizaciones', 'SaleController@getUrbanizacion');
Route::get('sfpt', 'SfpController@mostrar');
Route::get('sfpgp', 'SfpController@mostrargpon');
Route::get('sfptup', 'SfpController@mostrarup');




Route::get('oltodos', 'InstallggpmController@getOlt');
Route::get('odftodos', 'InstallggpmController@getOdf');
Route::get('tartodos', 'InstallggpmController@getTarget');
Route::get('porttodos', 'InstallggpmController@getPort');

// Route::get('/centrals', function () {
//     // return view('auth.login');
//     return  datatables::of(App\central::query())->make(true);
// });

// Route::get('puertos', 'Auth\aprovicionController@index2')->name('cards_ports');
// Route::post('puertos', 'Auth\aprovicionController@store2');

// Route::get('linea', 'Auth\aprovicionController@index3')->name('online_profile');
// Route::post('linea','Auth\aprovicionController@store3');

// Route::get('registrar', 'Auth\aprovicionController@index4')->name('install');
// Route::post('registrar', 'Auth\aprovicionController@store4');

// Route::get('ventas', 'Auth\aprovicionController@index5')->name('sales');
// Route::post('ventas', 'Auth\aprovicionController@store5');

// Route::get('servicios', 'Auth\aprovicionController@index6')->name('service_profile');
// Route::post('servicios', 'Auth\aprovicionController@store6');

/* Route::get('datos', 'Auth\aprovicionController@index7')->name('datos');
Route::post('datos', 'Auth\aprovicionController@store7'); */

// Route::Post('datos', 'Auth\LoginController@login')->name('login');

Auth::routes();
Route::prefix('/')->group(function () {


Route::resource('Installggpm', InstallggpmController::class)->names('installggpm');
});
Route::prefix('/')->group(function () {
    Route::resource('Odf', OdfController::class)->names('Odf');
    Route::get('/odfs', 'OdfController@mostrar2');
    Route::get('/odf1', 'OdfController@mostrar');


   });



Route::prefix('/')->group(function () {
    Route::resource('config_card', config_cardController::class)->names('config_card');
    Route::get('/config_cards', 'config_cardController@mostrar');

});

Route::prefix('/')->group(function () {
    Route::resource('manga', MangaController::class)->names('manga');
    Route::get('/mangas1', 'MangaController@mostrar');


});

Route::prefix('/')->group(function () {
    Route::resource('splitter', SplitterController::class)->names('splitter');
    Route::get('/splitters', 'SplitterController@all');
    Route::get('/splitter1', 'SplitterController@mostrar');
    Route::get('/splitter2', 'SplitterController@mostrar2');



});

