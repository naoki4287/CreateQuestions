<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    if ($this->path() == 'update') {
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
      'question' => 'required|unique:question_answers|max:1000',
      'answer' => 'required|max:1000',
    ];
  }

  public function messages()
  {
    return [
      'question.required' => '問題は必ず入力してください',
      'question.unique' => '同じ問題は保存できません',
      'question.max' => '問題は1000字以内で入力してください',
      'answer.required' => '解答は必ず入力してください',
      'answer.max' => '解答は1000字以内で入力してください',
    ];
  }
}
