<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Producto;
use App\OrdenCompra;
use DB;

class OrdenesCompraController extends Controller
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
    public function index()
    {
        $ordenes = OrdenCompra::all();
        return view('ordenes_compra.index')->with([
            'ordenesCompra' => $ordenes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all(['id', 'nombre']);
        $productos = Producto::all(['id', 'nombre', 'precio']);
        return view('ordenes_compra.create')->with([
            'clientes' => $clientes,
            'productos' => $productos
        ]);
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
            'cliente' => 'required',
            'descuento' => 'nullable|numeric',
            'productos' => 'required|array',
            'productos.*.producto_id' => 'required',
            'productos.*.unidades' => 'required|numeric',
            'productos.*.descripcion' => 'required',
            'productos.*.precio_unitario' => 'required|numeric',
        ]);
        $success = false;
        DB::transaction(function () use (&$request, &$success) {
            $ordenCompra = new OrdenCompra();
            $ordenCompra->cliente()->associate( $request->input('cliente') );
            $ordenCompra->user()->associate( auth()->user()->id );
            $ordenCompra->descuento = $request->input('descuento', 0);
            $inputProductos = collect( $request->input('productos') );
            $subtotal = $inputProductos->reduce(function ($carry, $producto) {
                return $carry + ($producto['unidades'] * $producto['precio_unitario']);
            }, 0);
            $ordenCompra->subtotal = $subtotal;
            $subtotalDescontado = ($subtotal - $ordenCompra->descuento);
            $ordenCompra->iva = ($subtotalDescontado * 0.16);
            $ordenCompra->total = ($subtotalDescontado + $ordenCompra->iva);
            $ordenCompra->save();
            $inputProductos->each(function ($inputProducto) use (&$ordenCompra) {
                $ordenCompra->productos()->attach($inputProducto['producto_id'], [
                    'unidades' => $inputProducto['unidades'],
                    'importe' => ($inputProducto['precio_unitario'] * $inputProducto['unidades']),
                    'precio_unitario' => $inputProducto['precio_unitario'],
                    'descripcion' => $inputProducto['descripcion']
                ]);
            });
            $success = true;
        });
        if ($success && $request->ajax()) {
            return response()->json(['data' => 'creado'], 201);
        } else {
            return response()->json(['data' => 'error'], 500);
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
        $orden = OrdenCompra::findOrFail($id);
        return view('ordenes_compra.show')->with(['ordenCompra' => $orden]);
    }

    /**
     * Display the specified resource as pdf.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pdf($id)
    {
        $orden = OrdenCompra::findOrFail($id);
        return view('ordenes_compra.pdf')->with(['ordenCompra' => $orden]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
