<?php

namespace App\Http\Requests;
use App\Rules\Authcheck;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
         return [
            'comment' => ['required', 'min:3', 'max:25' ],
            'rating' => ['required' , 'integer'],
                       

        ];
    }
}
