<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function index() {
        return view('site.home');
    }

    public function contato() {
        return "Contato.";
    }

    public function categoria(int $id = null) {
        if($id == null) {
            return "Todas as categorias";
        } else {
            return "Categoria especificada - {$id}";
        }
    }
}
