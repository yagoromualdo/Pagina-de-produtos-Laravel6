<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductRequest;
use App\Models\Product;
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
            'index', 'show', 'create', 'edit', 'update', 'store'
    ]);
    }

    public function index() {

        $products = Product::latest()->paginate();

    return view('admin.pages.products.index', [
        'products' => $products,
    ]);
    }


    public function create() {
        return view('admin.pages.products.create');
    }


    public function store(StoreUpdateProductRequest $request) {

        /*
        $request->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'nullable|min:3|max:10000',
            'photo' => 'required|image'
        ]);
        */

        dd('OK');

        if ($request->file('photo')->isValid()) {
            $nameFile =$request->name . '.' . $request->photo->extension();
            dd($request->file('photo')->storeAs('products', $nameFile));
        }
    }

    public function show($id) {
        return "Detalhes do produto {$id}";
    }


    public function edit($id) {
        return view('admin.pages.products.edit', compact('id'));
    }


    public function update(Request $request, $id) {
        dd("Editado o produto {$id}");
    }


    public function destroy($id) {

    }

}
