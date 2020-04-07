<?php

namespace Modules\Ventas\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Ventas\Service\ClienteService;
use Modules\Ventas\Service\VentaService;
class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    private $VentaService;
     public function __construct(VentaService $VentaService){

        $this->VentaService=$VentaService;
     }

    public function index()    { 
        
        return view('ventas::ventas.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {  
        $ListaClientes=$this->VentaService->ListaClientes();
        $ListaProductos=$this->VentaService->ListaProductos();
        return view('ventas::ventas.nueva_venta',compact('ListaClientes','ListaProductos'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('ventas::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('ventas::edit');
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
