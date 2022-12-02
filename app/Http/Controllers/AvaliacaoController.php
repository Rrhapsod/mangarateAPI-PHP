<?php

namespace App\Http\Controllers;

use App\Http\Resources\AvaliacaoCollection;
use App\Models\Avaliacao;
use App\Rules\UniqueRatingManga;
use Illuminate\Http\Request;

class AvaliacaoController extends Controller
{
    /**
     * Retorna todas as avaliações cadastradas
     *
     * @return Collection
     */
    public function index()
    {
        $avaliacoes = Avaliacao::with("manga")->get();

        return new AvaliacaoCollection($avaliacoes);
    }

    /**
     * Cria um novo registro de avaliação
     *
     * @param Request $request
     * @return Avaliacao
     */
    public function store(Request $request)
    {
        $request->validate([
            "email" => ["required", "email", new UniqueRatingManga($request->input("manga_id", 0))],
            "nota" => ["required", "numeric", "between:0,10"],
            "manga_id" => ["required", "int", "exists:mangas,id"]
        ]);

        $dadosAvaliacao = $request->all();

        return Avaliacao::create($dadosAvaliacao);
    }
}
