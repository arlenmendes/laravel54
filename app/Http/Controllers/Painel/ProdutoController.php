<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Illuminate\Http\Request;
use App\Http\Requests\ProdutoFormRequest;

class ProdutoController extends Controller {
	private $produto;

	public function __construct(Produto $produto) {
		$this->produto = $produto;
	}
	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function index() {
		$produtos = $this->produto->all();
		$titulo = 'Listagem de Produtos';
		return view('produtos.produtos', compact('produtos', 'titulo'));
	}

	/**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function create() {
		$titulo = 'Cadastro de Produtos';

		return view('produtos.create', compact('titulo'));
	}

	/**
	* Store a newly created resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @return \Illuminate\Http\Response
	*/
	public function store(ProdutoFormRequest $request) {
		//pegar todos os dados
		$dados = $request->all();

		$dados['ativo'] = (!isset($dados['ativo'])) ? 0 : 1;

		//Fazer o cadastro
		$insert = $this->produto->create($dados);

		if ($insert) {
			return redirect()->route('produtos.index');
		} else {
			return redirect()->back();
		}

	}

	/**
	* Display the specified resource.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function show($id) {
		$produto = $this->produto->find($id);

		$titulo = "Detalhes do produto: {$produto->nome}";

		return view('produtos.show', compact('produto', 'titulo'));
	}

	/**
	* Show the form for editing the specified resource.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function edit($id) {
		$produto = $this->produto->find($id);

		$titulo = "Editar Produto: {$produto->nome}";

		return view('produtos.create', compact('titulo', 'produto'));
	}

	/**
	* Update the specified resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function update(ProdutoFormRequest $request, $id) {

		$dados = $request->all();

		$dados['ativo'] = (!isset($dados['ativo'])) ? 0 : 1;

		$produto = $this->produto->find($id);

		$update = $produto->update($dados);

		if( $update )
			return redirect()->route('produtos.index');
		else
			return redirect()->back();
	}

	/**
	* Remove the specified resource from storage.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function destroy($id) {
		$produto = $this->produto.find($id);

		$destroy = $produto->destroy();

	}
}
