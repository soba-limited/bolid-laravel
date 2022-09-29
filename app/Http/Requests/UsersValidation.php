<?php
namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

//*************************************************************
// Rule
//1.  use App\Http\Requests\UsersValidation; //Add Controller
//2.  public function store( UsersValidation $request ){ //example
//*************************************************************

class UsersValidation extends FormRequest
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
				"name" => "nullable|max:255", //string('name',255)->nullable()
				"email" => "nullable|max:255", //string('email',255)->nullable()
				"email_verified_at" => "nullable|date_format:Y-m-d H:i:s", //timestamp('email_verified_at')->nullable()
				"password" => "nullable|max:255", //string('password',255)->nullable()
				"remember_token" => "nullable|max:100", //string('remember_token',100)->nullable()
				"account_type" => "required|integer", //integer('account_type')
				"l_profile_id" => "nullable|integer", //bigInteger('l_profile_id')->nullable()
				"c_profile_id" => "nullable|integer", //bigInteger('c_profile_id')->nullable()
				"d_profile_id" => "nullable|integer", //bigInteger('d_profile_id')->nullable()
				"point" => "required|integer", //integer('point')

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



