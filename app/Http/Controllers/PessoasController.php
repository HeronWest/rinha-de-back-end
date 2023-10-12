<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Exception;
use Illuminate\Http\Request;

class PessoasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Pessoa::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                "nome" => "required",
                "apelido" => "required",
                "nascimento" => "required",
                "stack" => "required",
            ]);
            Pessoa::create($request->all());

            return response()->json([
                "message" => $request,
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Erro ao criar pessoa",
                "error" => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $pessoa = Pessoa::findOrFail($id);

            return response()->json([
                "message" => $pessoa,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Erro ao buscar pessoa",
                "error" => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                "nome" => "required",
                "apelido" => "required",
                "nascimento" => "required",
                "stack" => "required",
            ]);
            $pessoa = Pessoa::findOrFail($id);
            $pessoa->update($request->all());

            return response()->json([
                "message" => $pessoa,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Erro ao atualizar pessoa",
                "error" => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $pessoa = Pessoa::findOrFail($id);
            $pessoa->delete();

            return response()->json([
                "message" => "Pessoa deletada com sucesso",
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Erro ao deletar pessoa",
                "error" => $e->getMessage(),
            ], 400);
        }
    }
}