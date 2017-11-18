<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class ProductosController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $search = "%" . $request->input('search') . "%";
            $productos = Producto::where('nombre', 'LIKE', $search)->orWhere('descripcion', 'LIKE', $search)->get();
        } else {
            $productos = Producto::all();
        }
        return view('productos.index')->with(['productos' => $productos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre'        => 'required|string|max:100',
            'precio'        => 'required|numeric|min:0',
            'descripcion'   => 'nullable|string',
            'imagen'        => 'image'
        ]);
        $producto = Producto::create( $request->all() );
        if ($request->hasFile('imagen') && $request->file('imagen')->isValid()) {
            $file = $request->file('imagen');
            $extension = $file->getClientOriginalExtension();
            $path = $file->storeAs('productos', $producto->id.'-imagen.'.$extension, "public");
            $path = "storage/".$path;
            $producto->imagen = $path;
            $producto->save();
        }
        return redirect()->route('productos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);
        return view('productos.show')->with(['producto' => $producto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
        return view('productos.edit')->with(['producto' => $producto]);
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
        $this->validate($request, [
            'nombre' => 'required|string|max:100',
            'precio' => 'required|numeric|min:0',
            'descripcion' => 'nullable|string',
            'imagen' => 'image'
        ]);
        $producto = Producto::find($id);
        $producto->update( $request->all() );
        if ($request->hasFile('imagen') && $request->file('imagen')->isValid()) {
            $file = $request->file('imagen');
            $extension = $file->getClientOriginalExtension();
            $path = $file->storeAs('productos', $producto->id.'-imagen.'.$extension, "public");
            $path = "storage/".$path;
            $producto->imagen = $path;
            $producto->save();
        }
        return redirect()->route('productos.show', ['producto' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->delete();
        return redirect()->route('productos.index');
    }
}
