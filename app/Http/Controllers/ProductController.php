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
            'index', 'show', 'create', 'edit', 'update', 'store', 'destroy', 'search'
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

        if ($request->hasFile('image') && $request->image->isValid()) {
            $imagePath = $request->image->store('products');

            $data['image'] = $imagePath;
        }

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
        if (!$product =$this->repository->find($id))
        return redirect()->back();

        return view('admin.pages.products.edit', compact('product'));
    }


    public function update(StoreUpdateProductRequest $request, $id) {
        if (!$product =$this->repository->find($id))
        return redirect()->back();

        $product->update($request->all());

        return redirect()->route('products.index');
    }


    public function destroy($id) {
        $product = $this->repository->where('id',$id)->first();
        if (!$product)
            return redirect()->back();

        $product->delete();

        return redirect()->route('products.index');
    }

    public function search(Request $request) {

        $filters = $request->except('_token');

        $products = $this->repository->search($request->filter);

        return view('admin.pages.products.index', [
            'products' => $products,
            'filters' => $filters,
        ]);
    }

}
