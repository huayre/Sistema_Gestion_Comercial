<?php
namespace Modules\Almacen\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use DataTables;
use Modules\Almacen\Entities\Categoria;
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
            $data = Categoria::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editar">Editar</a>';

                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm eliminar">Eliminar</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
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
    public function store(CategoriaFormRequest $request)
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
        Categoria::find($id)->delete();
        return response()->json(['success'=>'Product deleted successfully.']);
    }
}
