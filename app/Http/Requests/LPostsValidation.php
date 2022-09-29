<?php
namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

//*************************************************************
// Rule
//1.  use App\Http\Requests\LPostsValidation; //Add Controller
//2.  public function store( LPostsValidation $request ){ //example
//*************************************************************

class LPostsValidation extends FormRequest
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
				"l_category_id" => "nullable|integer", //integer('l_category_id')->nullable()
				"l_series_id" => "nullable|integer", //bigInteger('l_series_id')->nullable()
				"title" => "nullable|max:255", //string('title',255)->nullable()
				"thumbs" => "nullable|max:255", //string('thumbs',255)->nullable()
				"mv" => "nullable|max:255", //string('mv',255)->nullable()
				"sub_title" => "nullable|max:255", //string('sub_title',255)->nullable()
				"discription" => "nullable", //text('discription')->nullable()
				"content" => "nullable", //longText('content')->nullable()
				"state" => "nullable|integer", //integer('state')->nullable()

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



