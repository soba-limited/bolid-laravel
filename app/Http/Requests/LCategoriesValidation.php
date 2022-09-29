<?php
namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

//*************************************************************
// Rule
//1.  use App\Http\Requests\LCategoriesValidation; //Add Controller
//2.  public function store( LCategoriesValidation $request ){ //example
//*************************************************************

class LCategoriesValidation extends FormRequest
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
                "name" => "nullable|max:100", //string('name',100)->nullable()
                "slug" => "nullable|max:100", //string('slug',100)->nullable()
                "depth" => "required|integer", //integer('depth')
                "parent_id" => "nullable|integer", //integer('parent_id')->nullable()

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
