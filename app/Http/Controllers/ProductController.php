<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;

        // $this->middleware('auth')->only([
        //     'create'
        // ]);
        $this->middleware('auth')->except([
            'index', 'show'
    ]);
    }

    public function index()
    {
        $teste = 123;

        $teste2 = [];

        $products = ['TV', 'Geladeira', 'Forno', 'Sofá'];

    return view('admin.pages.products.index', compact('teste', 'teste2', 'products'));
    }


    public function create()
    {
    }


    public function store(Request $request)
    {

    }

    public function show($id)
    {
        return "Detalhes do produto {$id}";
    }


    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {

    }

}
