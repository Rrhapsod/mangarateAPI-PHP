<?php

namespace App\Rules;

use App\Models\Avaliacao;
use Illuminate\Contracts\Validation\Rule;

class UniqueRatingManga implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(
        private int $mangaId
    ) {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $alreadyRated = Avaliacao::where("email", $value)
            ->where("manga_id", $this->mangaId)
            ->first();

        return !$alreadyRated;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Você já avaliou esse mangá.';
    }
}
