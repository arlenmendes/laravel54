<?php
Route::get('produtos/teste','Painel\ProdutoController@teste');
Route::resource('produtos', 'Painel\ProdutoController');