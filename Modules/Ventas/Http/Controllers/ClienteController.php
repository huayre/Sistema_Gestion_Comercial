<?php

namespace Modules\Ventas\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Ventas\Service\ClienteService;
use Modules\Ventas\Http\Requests\ClienteFormRequest;
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    private $ClienteService;
    public function __construct(ClienteService $ClienteService){
       $this->ClienteService=$ClienteService;
    }
    public function index(Request $request)
    {
       if($request->ajax()){
          return $this->ClienteService->TablaClientes();
       }
       return view('ventas::clientes.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('ventas::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(ClienteFormRequest $request)
    {
        $this->ClienteService->RegistrarCliente($request);
        return response()->json(['success'=>'el cliente fue agregado correctamente']);
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
