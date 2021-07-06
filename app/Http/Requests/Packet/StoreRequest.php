<?php

namespace App\Http\Requests\Packet;

use Illuminate\Foundation\Http\FormRequest;

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
            'packet_category_id'    => ['required','numeric'],
            'name'                  => ['required','min:8'],
            'description'           => ['required','min:8'],
            'quota'                 => ['required','integer'],
            'price'                 => ['required','integer','min:0'],
            'point_reward'          => ['required','integer','min:0'],
            'active_period'         => ['required','integer','min:0'],
        ];
    }
}
