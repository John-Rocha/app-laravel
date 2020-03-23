<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $request;
    protected $user;

    public function __construct(Request $request)
    {
        //dd($request);
        $this->request = $request;


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
        $teste = '123';
        $teste3 = [1,2,3,4,5];
        $products = ['TV', 'Geladeira', 'Forno', 'Sofá'];

        return view('admin.pages.products.index', compact('teste', 'products'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProductRequest $request)
    {
        /*
        $request->validate([
            'nome' => 'required|min:3|max:255',
            'descricao' => 'nullable|min:3|max:10000',
            'foto' => 'required|image',
        ]);
        */

        //dd($request->all());
        //dd($request->only('descricao'));
        //dd($request->name);
        //dd($request->input('name', 'produto não informado'));
        //dd($request->except('_token'));

        if ($request->file('foto')->isValid()) {
            //dd($request->file('foto')->store('products'));
            $nameFile = $request->nome . '.' . $request->foto->extension();
            dd($request->file('foto')->storeAs('products', $nameFile));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "Exibindo o produto: {$id}";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.pages.products.edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd("Editando o produto {$id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "Deletando o produto: {$id}";
    }
}
