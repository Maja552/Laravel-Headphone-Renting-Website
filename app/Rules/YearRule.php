<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class YearRule implements ValidationRule
{
    private string $transName;

    public function __construct($transName)
    {
        $this->transName = $transName;
    }


    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!is_numeric($value)) {
            $fail(__('validation.numeric', ['attribute' => $attribute]));
        }

        if (!($value == "0000" || (intval($value) >= 1901 && intval($value) <= 2155))) {
            if($this->transName) {
                $fail(__('validation.validation.year', ['attribute' => __($this->transName)]));
            } else {
                $fail(__('validation.validation.year_generic'));
            }
        }
    }
}
