<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Firebase\Products;
use App\Http\Requests\ProductoStoreRequest;

class TestController extends Controller
{
    public function index()
    {
        $productos = Products::all();

        return view('welcome', compact('productos'));
    }

    public function store(ProductoStoreRequest $request)
    {
        $producto = Products::create($request->validated());

        return redirect()->route('/')->with([
            'message' => 'Producto creado correctamente',
            'type' => 'success',
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ], [
            'id.required' => 'No se encontró el producto',
        ]);

        Products::update();

    }
}
