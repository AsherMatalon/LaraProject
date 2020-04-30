<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use publishe;
class AddPublish extends FormRequest
{
    public static $requestType = "|unique:publishes,AdvertisingName";
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
            "WebPageName"    => "required|min:2|max:30".self::$requestType,
            "AdvertisingName" => "Required|min:2|max:500",
            "AdvertisingFile"       =>"file|image",
        ];
        
    }
}
