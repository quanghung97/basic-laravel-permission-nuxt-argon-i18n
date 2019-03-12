<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MinMaxRule implements Rule
{
    protected $min;

    /**
     * Create a new rule instance.
     */
    public function __construct($min)
    {
        $this->min = $min;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $value > $this->min;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The maximum rent value must be greater than the minimum Min people.';
    }
}
