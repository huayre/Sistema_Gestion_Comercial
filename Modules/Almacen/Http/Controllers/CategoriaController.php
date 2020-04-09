<?php
namespace Modules\Almacen\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Almacen\Http\Requests\CategoriaFormRequest;
use Modules\Almacen\Service\CategoriaService;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    private $CategoriaService;

    public function __construct(CategoriaService $CategoriaService)
    {
        $this->CategoriaService = $CategoriaService;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
         return   $this->CategoriaService->TablaCategorias();
        }
        return view('almacen::categoria.index');

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
    public function store(CategoriaFormRequest  $request)
    {
        $this->CategoriaService->CrearCategoria($request);
        return response()->json(['success' => 'La categoría fue creado correctamente !!!']);
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
        $Categoria=$this->CategoriaService->BuscarCategoria($id);
         
        return response()->json($Categoria);

    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(CategoriaFormRequest $request, $id)
    {
        $this->CategoriaService->ActualizarCategoria($request,$id);

        return response()->json(['success'=>'La Categoria fue actualizado correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->CategoriaService->EliminarProducto($id);
        return response()->json(['success'=>'Product deleted successfully.']);
    }
}
