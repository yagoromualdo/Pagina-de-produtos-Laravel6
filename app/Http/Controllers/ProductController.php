<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $request;
    private $repository;

    public function __construct(Request $request, Product $product)
    {
        $this->request = $request;
        $this->repository = $product;

        // $this->middleware('auth')->only([
        //     'create'
        // ]);
        $this->middleware('auth')->except([
            'index', 'show', 'create', 'edit', 'update', 'store', 'destroy'
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
        $data = $request->only('name', 'description', 'price');

        $this->repository->create($data);

        return redirect()->route('products.index');
    }

    public function show($id) {

        if (!$product =$this->repository->find($id))
        return redirect()->back();

        return view('admin.pages.products.show', [
            'product'=>$product
        ]);
    }


    public function edit($id) {
        return view('admin.pages.products.edit', compact('id'));
    }


    public function update(Request $request, $id) {
        dd("Editado o produto {$id}");
    }


    public function destroy($id) {
        $product = $this->repository->where('id',$id)->first();
        if (!$product)
            return redirect()->back();

        $product->delete();

        return redirect()->route('products.index');
    }

}
