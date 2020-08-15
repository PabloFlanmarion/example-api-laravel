<?php
namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{

    const REGISTRO_INEXISTENTE_NO_BANCO = "REGISTRO INEXISTENTE NO BANCO";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaCategorias = Categoria::all();
        return response($listaCategorias, 201)->header('Content-Type', 'application/json');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {}

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoria = new Categoria();
        $categoria->nome = $request->nome;
        $categoria->descricao = $request->descricao;
        $categoria->save();
        return response($categoria, 201)->header('Content-Type', 'application/json');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Categoria $categoria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $categoria = Categoria::find($id);
            if (isset($categoria)) {
                response("OK", 201);
                return response($categoria, 201)->header('Content-Type', 'application/json');
            } else {
                return response($this->responseBody(self::REGISTRO_INEXISTENTE_NO_BANCO), 404)->header('Content-Type', 'application/json');
            }
        } catch (\Exception $ex) {
            $ex->getMessage();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Categoria $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Categoria $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {

            $categoria = Categoria::find($request->id);
            if (isset($categoria)) {
                $categoria->nome = $request->nome;
                $categoria->descricao = $request->descricao;
                $categoria->save();
                return response($categoria, 201)->header('Content-Type', 'application/json');
            } else {
                return response($this->responseBody(self::REGISTRO_INEXISTENTE_NO_BANCO), 404)->header('Content-Type', 'application/json');
            }
        } catch (\Exception $ex) {
            $ex->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Categoria $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $categoria = Categoria::find($id);
            if (isset($categoria)) {
                $categoria->delete();
                return response($categoria, 201)->header('Content-Type', 'application/json');
            } else {
                return response($this->responseBody(self::REGISTRO_INEXISTENTE_NO_BANCO), 404)->header('Content-Type', 'application/json');
            }
        } catch (\Exception $ex) {
            $ex->getMessage();
        }
    }

    public function notific()
    {
        return "oi";
    }

    /**
     * 
     * @param string $texto
     * @return array
     */
    private function responseBody($texto)
    {
        return [
            'body' => [
                'codigoErro' => 3,
                'mensagemErro' => $texto
            ]
        ];
    }
}
