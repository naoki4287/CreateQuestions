<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    if ($this->path() == 'insert')
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
      'title' => 'required|unique:titles|max:20',
    ];
  }

  public function messages()
  {
    return [
      'title.required' => 'タイトルは必ず入力してください',
      'title.unique' => '同じ名前は保存できません',
      'title.max' => '20字以内で入力してください'
    ];
  }
}
