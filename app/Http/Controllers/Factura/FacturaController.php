<?php

namespace App\Http\Controllers\Factura;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\updateClienteRequest;
use App\Producto;
use App\Factura;
use App\Factura_Producto;
use App\Cliente;
use Auth;

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
        return view('app.factura.create', ['crudstatus' => 'create'], compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user(); // Se recopila la información de usuario

        $data = $request->all();

        $productos = $request->newProducto;
        // $cliente = $request->get('cliente')
        if(!$request->slug) {
            $data['slug'] = str_random(16);
            $cliente = new Cliente($data);
            $cliente->save();
            $client = Cliente::whereSlug($cliente->slug)->first();
        } else {
            $client = Cliente::whereSlug($request->slug)->first();
        }
        $data['user_id'] = $user->id;
        $data['cliente_id'] = $client->id;
        $data['number'] = $data['facturaNum'];
        $factura = new Factura($data);
        $factura->save();
            foreach ($productos as $producto) {
                $enFactura = new Factura_Producto($producto);
                $enFactura->factura_id = $factura->id;
                $enFactura->save();
            }
        return response()->json([
            "message" => $factura->number
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $factura = Factura::whereNumber($id)->get()->last()->load('productos')->load('cliente:id,slug');

        if($request->ajax()){
            return $this->showOne($factura);
        } else {
            return view('app.factura.create' , ['crudstatus' => 'show'], compact('productos'));
        }
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

    public function lastNumber()
    {
        $factura = Factura::get()->max('number');
        return response()->json($factura + 1, 200);
        return $factura;
    }
}
