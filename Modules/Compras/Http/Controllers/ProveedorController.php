<?php

namespace Modules\Compras\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Compras\Service\ProveedorService;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    private $ProveedorService;
    public function __construct(ProveedorService $ProveedorService){
        $this->ProveedorService=$ProveedorService;
    }
    public function index()
    { 
        $ListaDepartamentos=$this->ProveedorService->ListaDepartamentos();
        return view('compras::proveedor.index',compact('ListaDepartamentos'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('compras::create');
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
        return view('compras::show');
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

    public function getprovincias($id){
        $ListaProvincias=$this->ProveedorService->BuscarProvincias($id);
        return response()->json($ListaProvincias);
    }

    public function getdistritos($id){
        $ListaDistritos=$this->ProveedorService->BuscarDistritos($id);
        return response()->json($ListaDistritos);
    }
}
