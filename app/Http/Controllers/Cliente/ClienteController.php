<?php

namespace App\Http\Controllers\Cliente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\updateClienteRequest;
use App\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clientes = Cliente::all();
        if($request->ajax()){
            return $this->showAll($clientes);
        } else {
            return view('app.clientes.listar' ,compact('clientes'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.clientes.cliente', ['crudstatus' => 'create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(updateClienteRequest $request)
    {
        
        $data = $request->all();
        $data['slug'] = str_random(16);
        $cliente = new Cliente($data);
        $cliente->save();
        return $cliente->slug;
        // return redirect('clientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Cliente $cliente)
    {
        if($request->ajax()){
            return $this->showOne($cliente);
        } else {
            return view('app.clientes.cliente' , ['crudstatus' => 'show'] ,compact('cliente'));
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
    public function update(updateClienteRequest $request, Cliente $cliente)
    {
        $data = $request->all();
        $cliente->update($data);
        $cliente->save();
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                //$cliente->delete();
                return back()->with();
    }
}
