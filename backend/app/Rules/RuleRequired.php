<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * @author Italo Rodrigo <italo.computation@gmail.com>
 */

class RuleRequired implements Rule
{
    public function passes($attribute, $value)
    {
        if(empty($value)){
            return false;
        }
        return true;
    }
    public function message()
    {
        return 'O campo :attribute é requirido.';
    }
}
