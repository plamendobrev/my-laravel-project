<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:1|max:255',
            'description' => 'nullable|string|max:2000',
            'release_date' => 'required|date',
            'manufacturer_id' => 'required|exists:manufacturers,id',
            'genres' => 'required|array',
            'genres.*' => 'exists:genres,id',
            'rating' => 'nullable|integer|min:1|max:5',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'release_date.required' => 'Please provide a release date.',
            'manufacturer_id.required' => 'Please specify a manufacturer.',
            'manufacturer_id.exists' => 'The selected manufacturer does not exist.',
            'genres.required' => 'Please select at least one genre.',
            'genres.array' => 'Genres must be a valid list.',
            'genres.*.exists' => 'One or more of the genres do not exist.',
            'cover.image' => 'The cover art must be an image.',
            'cover.mimes' => 'Only JPG and PNG images are supported.',
            'cover.max' => 'The cover art file cannot exceed 2MB.'
        ];
    }
}
