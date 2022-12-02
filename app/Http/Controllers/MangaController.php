<?php

namespace App\Http\Controllers;

use App\Http\Requests\MangaRequest;
use App\Models\Manga;

class MangaController extends Controller
{

    /**
     * Retorna a lista de mangás cadastrados
     *
     * @return Collection
     */
    public function index()
    {
        return Manga::get();
    }

    /**
     * Cria um novo mangá no banco
     *
     * @param MangaRequest $request
     * @return Manga
     */
    public function store(MangaRequest $request)
    {
        $dadosManga = $request->all();

        return Manga::create($dadosManga);
    }
}
