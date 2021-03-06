<?php

namespace Modules\Almacen\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Almacen\Http\Requests\ProductoFormRequest;
use Modules\Almacen\Service\ProductoService;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    private $ProductoService;

    public function __construct(ProductoService $ProductoService)
    {
        $this->ProductoService=$ProductoService;
    }

    public function index(Request $request)
    {
        if ($request->ajax()){
           return $this->ProductoService->ListaProductos();
        }
        $ListaCategorias=$this->ProductoService->ListaCategorias();
        $ListaMarcas=$this->ProductoService->ListaMarcas();
        return view('almacen::producto.index',compact('ListaCategorias','ListaMarcas'));
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
    public function store(ProductoFormRequest $request)
    {
        $this->ProductoService->RegistrarProducto($request);
        return response()->json(['success' => 'El producto fue creado correctamente !!!']);
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
