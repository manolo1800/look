<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ContrasenaFuerte implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
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
        //
       // return strtoupper($value)===$value;
        //$uppercase = preg_match('@[\d{2}+\D{2}||\D{2}+\d{2}]@', $value);
        $prueba = preg_match('@[0-9]{2}@', $value);
        $prueba1 = preg_match('@[a-z-A-Z]{2}@', $value);
       // $Prueba2 = preg_match('@[A-Z]{2}@', $value);
    
        return $prueba1 && $prueba; //&& $lowercase && $number && $specialChars;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'La :attribute debe ser del formato 12XX dos digitos y 2 letras';
    }
}
