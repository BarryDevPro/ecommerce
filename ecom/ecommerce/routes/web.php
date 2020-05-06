<?php

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

Route::get('/','HomeController@index');
Route::get('/dashboard', function () {
    return view('home');
})->middleware('auth');
Route::get('/connexion','ConnexionController@index')->name('connexion.get');
Route::post('/connexion','ConnexionController@store')->name('connexion.post');
Route::get('/deconnexion','ConnexionController@logout')->name('connexion.logout');

//panier
Route::get('/cart','CartController@index')->name('cart.get');
Route::post('/cart','CartController@store')->name('cart.post');
Route::post('/cart/update','CartController@update')->name('cart.update');
Route::post('/cart/delete','CartController@delete')->name('cart.delete');
Route::get('/cart/valider','CartController@valider')->name('cart.valide');

Route::get('/registre','RegistreController@index')->name('registre.get');
Route::post('/registre','RegistreController@store')->name('registre.post');

Route::resource('produit', 'ProduitController')->middleware('auth');
Route::resource('commande', 'CommandeController')->middleware('auth');
Route::resource('categorie', 'CategorieController')->middleware('auth');
Route::resource('client', 'ClientController')->middleware('auth');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
