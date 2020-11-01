<?php

namespace App\Http\Requests;

use App\Rules\Register\QuestionChecker;
use App\Rules\Register\UniqueEmail;
use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRules extends FormRequest
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
            'password' => 'required|max:20|min:5',
            'question' => ['required',new QuestionChecker],
            'answer' => 'required|max:30|min:5'
        ];
    }
}
