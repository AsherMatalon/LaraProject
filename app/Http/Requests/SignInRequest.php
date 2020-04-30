<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignInRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // if($user['user_role']==7){
        //     return true;
        // }
        // return false;
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
        'email' => 'email|min:6|required', // 'email=>'  THE tag <input name="email"> FROM THE login.blade.php file 
        'password' =>'required|min:3'//'password=>' THE tag <input name="password"> FROM THE login.blade.php file 
        ];
    }
    public function messages()
        {
            return [
                          
                'password.required' => 'שדה זה הוא שדה חובה',
                'password.min'      => 'יש להזין מינימום 6 תווים'
                //'password.max'      => 'יש להזין מקסימום 6 תווים'
            ];
        }
    public function attributes()
{
    return [
        'email.min' => 'password.min'
    ];
}
        
   
}

