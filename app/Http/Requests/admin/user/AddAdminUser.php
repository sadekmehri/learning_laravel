<?php

namespace App\Http\Requests\admin\user;

use App\Rules\admin\user\UniqueRole;
use App\Rules\Register\UniqueEmail;
use Illuminate\Foundation\Http\FormRequest;

class AddAdminUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nom' => 'required|max:30|min:5|regex:/^[A-Za-z0-9 ]+$/',
            'prenom' => 'required|max:30|min:5|regex:/^[A-Za-z ]+$/',
            'email' => ['required','email',new UniqueEmail],
            'role' => ['required',new UniqueRole]
        ];
    }
}
