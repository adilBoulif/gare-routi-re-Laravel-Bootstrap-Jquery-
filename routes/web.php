<?php
use App\SocTrans;
use App\Trajet;
use App\User;
use App\Reservation;
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
    return view('LayoutAdmin/HomeRech');
});
Route::get('/Admin', function () {
    return view('LayoutAdmin/HomeAdmin')->with(['Societes'=>SocTrans::all()]);
});
Route::get('/Admin/Societe/ajouter','SocTransController@create');
Route::post('/Admin/Societe/ajouter','SocTransController@store');
Route::get('/Admin/Societe/edit/{id}','SocTransController@edit');
Route::post('/Admin/Societe/edit/{id}','SocTransController@update');
Route::post('/Admin/Societe/delete/{id}','SocTransController@destroy');
Route::get('/Admin/Trajet/ajouter','TrajetController@create');
Route::post('/Admin/Trajet/ajouter','TrajetController@store');
Route::get('/Admin/Trajet/edit/{id}','TrajetController@edit');
Route::post('/Admin/Trajet/edit/{id}','TrajetController@update');
Route::post('/Admin/Trajet/delete/{id}','TrajetController@destroy');
Route::get('/Admin/User/ajouter','UserController@create');
Route::post('/Admin/User/ajouter','UserController@store');
Route::get('/Admin/User/edit/{id}','UserController@edit');
Route::post('/Admin/User/edit/{id}','UserController@update');
Route::post('/Admin/User/delete/{id}','UserController@destroy');
Route::get('/Admin/User', function () {
    return view('LayoutAdmin/AdminUser')->with(['user'=>User::all()]);
});

Route::get('/Admin/Trajet', function () {
    return view('LayoutAdmin/AdminTrajet')->with(['Societes'=>SocTrans::all(),'Trajets'=>Trajet::all()]);
});
Route::get('/login', function () {
    return view('LayoutAdmin/login');
});
Route::get('/Home', function () {
    return view('LayoutAdmin/HomeRech');
});
Route::post('/rechercher','TrajetController@recherche');
Route::post('/Reserve/{id}','ReservationController@AddToCart');
Route::get('/cart',[
    'uses'=>'ReservationController@AffichCart',
    'as'=>'cart.index'
]);
Route::post('/payment','ReservationController@payment');
Route::get('/login', function () {
    return view('LayoutAdmin/login');
});
Route::post('/Admin/Auth','UserController@authe');
Route::get('/Admin/deco','UserController@logout');
Route::post('/Card/remove','ReservationController@SuppCart');
Route::get('/Admin/Reservation', function () {
    return view('LayoutAdmin/AdminReservation')->with(['reserv'=>Reservation::all()]);
});
Route::post('/Admin/Reservation/delete/{id}','ReservationController@DeleteReser');



