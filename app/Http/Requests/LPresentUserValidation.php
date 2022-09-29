<?php
namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

//*************************************************************
// Rule
//1.  use App\Http\Requests\LPresentUserValidation; //Add Controller
//2.  public function store( LPresentUserValidation $request ){ //example
//*************************************************************

class LPresentUserValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //[ *1. default=false ]
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //[ *2. Validation rule description location ]
        return [
                "user_id" => "nullable|integer", //bigInteger('user_id')->nullable()
                "l_present_id" => "nullable|integer", //integer('l_present_id')->nullable()
                "hobby" => "nullable", //text('hobby')->nullable()
                "brand" => "nullable", //text('brand')->nullable()
                "cosmetic" => "nullable", //text('cosmetic')->nullable()
                "marriage" => "nullable|integer", //integer('marriage')->nullable()
                "child" => "nullable|integer", //integer('child')->nullable()
                "income" => "nullable|max:50", //string('income',50)->nullable()

            ];
    }

        //[ *3. Set Validation message (*Optional) ]
        //Be sure to use [messages] for the Function name.
        //[Ja]https://readouble.com/laravel/6.x/ja/validation-php.html
        public function messages()
        {
            return [
                //"email.required"  => "メールアドレスを入力してください",
                //"email.max"       => "**文字以下で入力してください",
            ];
        }
}