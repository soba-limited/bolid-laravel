<?php
namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

//*************************************************************
// Rule
//1.  use App\Http\Requests\LProfilesValidation; //Add Controller
//2.  public function store( LProfilesValidation $request ){ //example
//*************************************************************

class LProfilesValidation extends FormRequest
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
				"nicename" => "nullable|max:255", //string('nicename',255)->nullable()
				"sex" => "nullable", //string('sex')->nullable()
				"zipcode" => "nullable|max:16", //string('zipcode',16)->nullable()
				"zip" => "nullable|max:8", //string('zip',8)->nullable()
				"other_address" => "nullable|max:255", //string('other_address',255)->nullable()
				"age" => "nullable|digits:4", //integer('age',4)->nullable()
				"work_type" => "nullable|max:16", //string('work_type',16)->nullable()
				"industry" => "nullable|max:100", //string('industry',100)->nullable()
				"occupation" => "nullable|max:100", //string('occupation',100)->nullable()

            ];
        }
    
        //[ *3. Set Validation message (*Optional) ]
        //Be sure to use [messages] for the Function name.
        //[Ja]https://readouble.com/laravel/6.x/ja/validation-php.html
        public function messages(){
            return [
                //"email.required"  => "メールアドレスを入力してください",
                //"email.max"       => "**文字以下で入力してください",
            ];
        }
    
    }



