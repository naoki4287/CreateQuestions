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
      'title' => 'required|max:100',
    ];
  }

  public function messages()
  {
    return [
      'title.required' => 'タイトルは必ず入力してください',
      'title.max' => '100字以内で入力してください'
    ];
  }
}
