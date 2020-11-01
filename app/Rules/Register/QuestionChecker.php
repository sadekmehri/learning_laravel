<?php

namespace App\Rules\Register;

use App\Models\SecurityQuestion;
use Illuminate\Contracts\Validation\Rule;

class QuestionChecker implements Rule
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
        return SecurityQuestion::select('id_question')->where('id_question', '=', $value)->count() == 1;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Please Choose a valid Question .';
    }
}
