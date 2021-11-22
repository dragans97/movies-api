<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMovieRequest extends FormRequest
{
    protected $genres = [
        'comedy', 
        'thriller',
        'action',
        'sci-fi'
    ];
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
            'title' => 'required|string|min:5|max:255',
            'director'=> 'required|string|max:255',
            'image_url' => 'required|url',
            'duration' => 'required|integer|min:1|max:300',
            'release_date' => 'required|date',
            'genre' => 'required|in:'.implode(',', $this->genres),
        ];
    }
}
