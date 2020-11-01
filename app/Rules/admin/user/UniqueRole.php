<?php

namespace App\Rules\admin\user;

use App\Models\Permission;
use Illuminate\Contracts\Validation\Rule;

class UniqueRole implements Rule
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
        return Permission::select('id_permission')->where('id_permission', '=', $value)->count() == 1;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Please Choose a valid Option.';
    }
}
