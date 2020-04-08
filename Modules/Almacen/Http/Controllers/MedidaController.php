<?php

namespace Modules\Almacen\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Almacen\Service\UnidadMedidaService;
use Modules\Almacen\Http\Requests\MedidaFormRequest;

class MedidaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    private $UnidadMedidaService;
    public function __construct(UnidadMedidaService $UnidadMedidaService){
        $this->UnidadMedidaService=$UnidadMedidaService;
    }
    public function index(Request $request)
    {
        if($request->ajax()){
            return $this->UnidadMedidaService->TablaUnidadDeMedida();
        }

        return view('almacen::unidadmedida.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('almacen::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(MedidaFormRequest $request)
    {
        $this->UnidadMedidaService->CrearUnidadMedida($request);
         return response()->json(['success'=>'la unidad de medida fue creado correctamente...!!!']);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('almacen::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $UnidadMedida=$this->UnidadMedidaService->BuscarUnidadMedida($id);
        return response()->json($UnidadMedida);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(MedidaFormRequest $request, $id)
    {
        $this->UnidadMedidaService->ActualizarUnidadMedida($request,$id);
        return response()->json(['success'=>'la unidad de medida fue creado correctamente...!!!']);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->UnidadMedidaService->EliminarUnidadMedida($id);
        return response()->json(['success'=>'Product deleted successfully.']);
    }
}
