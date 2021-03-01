<?php

use Illuminate\Support\Facades\Route;

Route::get('/','HomeController@index')->name('home');

Route::group(['prefix'=>'contrato'],function (){
    Route::get('/','Contrato\ContratoController@index')->name('contrato.index');
    Route::get('/create','Contrato\ContratoController@create')->name('contrato.create');
    Route::post('/store','Contrato\ContratoController@store')->name('contrato.store');
    Route::get('/show/{id}','Contrato\ContratoController@show')->name('contrato.show');
    Route::get('/edit/{id}','Contrato\ContratoController@edit')->name('contrato.edit');
    Route::post('/update','Contrato\ContratoController@update')->name('contrato.update');
    Route::get('/delete/{id}','Contrato\ContratoController@delete')->name('contrato.delete');
});
Route::group(['prefix'=>'empresa'],function (){
    Route::get('/','Empresa\EmpresaController@index')->name('empresa.index');
    Route::get('/show/{id}','Empresa\EmpresaController@show')->name('empresa.show');
    Route::get('/edit/{id}','Empresa\EmpresaController@edit')->name('empresa.edit');
    Route::post('/update','Empresa\EmpresaController@update')->name('empresa.update');
});
