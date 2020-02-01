<?php

namespace Modules\Almacen\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Almacen\Http\Requests\MarcaFormRequest;
use Modules\Almacen\Service\MarcaService;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    private $MarcaService;
    public function __construct(MarcaService $MarcaService)
    {
        $this->MarcaService=$MarcaService;
    }

    public function index(Request $request)
    {
        if($request->ajax()){
        return $this->MarcaService->TablaMarcas();
        }

        return view('almacen::marca.index');
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
    public function store(MarcaFormRequest $request)
    {
        $this->MarcaService->CrearMarca($request);
        return response()->json(['success' => 'La marca fue creado correctamente !!!']);
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
        return view('almacen::edit');
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
