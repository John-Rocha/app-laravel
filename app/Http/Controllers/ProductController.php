<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductRequest;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    protected $request;
    protected $user;
    private $repository;

    public function __construct(Request $request, Product $product)
    {
        //dd($request);
        $this->request = $request;
        $this->repository = $product;


        // $this->middleware('auth')->except([
        //     'index', 'create'
        // ]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->repository->latest()->paginate();

        return view('admin.pages.products.index', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProductRequest $request)
    {

        $data = $request->only('nome', 'descricao', 'preco');

        if($request->hasFile('foto') && $request->foto->isValid()) {
            $imagePath = ($request->foto->store('products'));

            $data['image'] = $imagePath;
        }

        $this->repository->create($data);

        return redirect()->route('products.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$product = Product::where('id', $id)->first();
        $product = $this->repository->find($id);
        if(!$product)
            return redirect()->back();

        return view('admin.pages.products.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->repository->find($id);
        if(!$product)
            return redirect()->back();

        return view('admin.pages.products.edit', compact('product'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateProductRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProductRequest $request, $id)
    {
        $product = $this->repository->find($id);
        if(!$product)
            return redirect()->back();

        $data = $request->all();

        if($request->hasFile('foto') && $request->foto->isValid()) {

            if ($product->image && Storage::exists($product->foto)) {
                Storage::delete($product->foto);
            }

            $imagePath = ($request->foto->store('products'));
            $data['image'] = $imagePath;
        }

        $product->update($data);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->repository->find($id);
        if(!$product)
            return redirect()->back();

        if ($product->image && Storage::exists($product->foto)) {
            Storage::delete($product->foto);
        }

        $product->delete();

        return redirect()->route('products.index');
    }

    /**
     * Search Products
     */

    public function search(Request $request)
    {

        $filters = $request->except('_token');

        $products = $this->repository->search($request->filter);

        return view('admin.pages.products.index', [
            'products' => $products,
            'filters' => $filters,
        ]);
    }
}
