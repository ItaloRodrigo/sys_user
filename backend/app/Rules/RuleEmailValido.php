<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * @author Italo Rodrigo <italo.computation@gmail.com>
 */
class RuleEmailValido implements Rule
{


    /**
     * Valida se o Email é válido
     *
     * @param string $attribute
     * @param string $value
    * @return boolean
    */

    public function passes($attribute, $value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        return true;
    }

    public function message()
    {
    	return 'O campo :attribute não é um email válido.';
    }
}
