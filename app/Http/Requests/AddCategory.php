<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCategory extends FormRequest
{
    public static $requestType = "|unique:categories,cat_name";
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
        if ("!requestType"){
            self::$requestType= ""; 
        }
        return [
            "cat_name"    => "required|min:2|max:30".self::$requestType,
            "description" => "Required|min:2|max:500",
            "image"       =>"file|image",
        ];
        
    }
}
