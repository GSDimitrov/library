<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UploadBook extends Request
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
             'title'  => 'required|max:255',
             'author' => 'required|max:255',
             'isbn10' => 'required|min:10|max:10|unique:books', // is it column or table
             'isbn13' => 'required|min:13|max:13|unique:books',
             'genre'  => 'required|max:255',
             'cover' => 'required',
             'cover' => 'required|mimes:jpeg,jpg,png,gif|dimensions:width=250,height=400',
         ];

    }
}
