<?php

namespace App\Http\Requests\Credit;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class StoreRequest extends FormRequest
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
            'phone_number'  => ['required', 'min:11', 'numeric', 'exists:users,phone_number'],
            'balance'       => ['required', 'numeric', 'min:5000'],
            'point'         => ['required', 'numeric']
        ];
    }

    public function validated()
    {
        return array_merge($this->validator->validated(), [
            'user_id' => User::where('phone_number', $this->phone_number)->first()->id
        ]);
    }
}
