<?php

namespace App\Http\Controllers\Factura;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Producto;
use App\Factura;
use App\Factura_Producto;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $facturas = Factura::with('productos')->get();
        if($request->ajax()){
            return $this->showAll($facturas);
        } else {
            return view('app.factura.listar' ,compact('facturas'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Producto::all();
        return view('app.factura.create', compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $productos = $request->get('newProducto');
        $cliente = $request->get('cliente');

        $factura = new Factura($cliente);
        $factura->save();

            foreach ($productos as $producto) {
                $enFactura = new Factura_Producto($producto);
                $enFactura->factura_id = $factura->id;
                $enFactura->save();
            }

        return response()->json([
            "message" => $factura->id
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
