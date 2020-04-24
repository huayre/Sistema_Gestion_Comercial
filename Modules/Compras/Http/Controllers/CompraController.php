<?php

namespace Modules\Compras\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Compras\Service\CompraService;
use Modules\Compras\Http\Requests\CompraFormRequest;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    private $CompraService;

    public function __construct(CompraService $CompraService){
        $this->CompraService=$CompraService;
    }
    public function index(Request $request)
    {    
        if($request->ajax()){
            return $this->CompraService->TablaCompras();
        }
        return  view('compras::compra.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    { 
        $ListaProveedor=$this->CompraService->ListaProveedor();
        $ListaProductos=$this->CompraService->ListaProductos();
        return view('compras::compra.nueva_compra',compact('ListaProveedor','ListaProductos'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(CompraFormRequest $request)
    {        
       $this->CompraService->CrearNuevaCompra($request);

       return response()->json(['success'=>'La compra fue registrada correctamente']);      
                
      
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
       // return view('compras::show');
       dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('compras::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
