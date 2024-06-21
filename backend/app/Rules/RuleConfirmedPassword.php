<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * @author Italo Rodrigo <italo.computation@gmail.com>
 */
class RuleConfirmedPassword implements Rule
{
    private $password_confirm;

    /**
     * Valida se as senhas são iguais
     *
     * @param string $attribute
     * @param string $value
    * @return boolean
    */

    public function __construct($password_confirm)
    {
        $this->password_confirm = $password_confirm;
    }


    public function passes($attribute, $value)
    {
        if ($value != $this->password_confirm) {
            return false;
        }
        //---
        return true;
    }

    public function message()
    {
    	return 'A confirmação da senha não corresponde.';
    }
}
