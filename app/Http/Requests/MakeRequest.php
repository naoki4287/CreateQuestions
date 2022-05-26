<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MakeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
  {
    if ($this->path() == 'make')
    {
      return true;
    } else {
      return false;
    }
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'question' => 'required|max:1000',
      'answer' => 'required|max:1000',
    ];
  }

  public function messages()
  {
    return [
      'question.required' => '問題は必ず入力してください',
      'question.max' => '問題は1000字以内で入力してください',
      'answer.required' => '解答は必ず入力してください',
      'answer.max' => '解答は1000字以内で入力してください',
    ];
  }
}
