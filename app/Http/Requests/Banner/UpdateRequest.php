<?php

namespace App\Http\Requests\Banner;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class UpdateRequest extends FormRequest
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
            'title'         => ['required'],
            'description'   => ['required'],
            'image'         => ['sometimes', 'mimes:jpg,png,jpeg', 'max:5048'],
        ];
    }
    public function validated()
    {
        if ($this->hasFile('image')){
            Storage::delete($this->route('banner')->image);
            
            $imagePath = $this->file('image')->store('public/banner');
        }else{
            $imagePath = $this->route('banner')->image;
        }

        return array_merge($this->validator->validated(),[
            'image' => $imagePath,
        ]);
    }
}
