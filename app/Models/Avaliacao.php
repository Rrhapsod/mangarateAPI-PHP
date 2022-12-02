<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    use HasFactory;

    protected $table = "avaliacoes";

    protected $fillable = ["email", "nota", "manga_id"];

    /**
     * Define a relação da avaliação com o mangá
     *
     * @return BelongsTo
     */
    public function manga()
    {
        return $this->belongsTo(Manga::class);
    }
}
