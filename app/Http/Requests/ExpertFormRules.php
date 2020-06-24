<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpertFormRules extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
        'user_id' => 'required|unique:experts',
        'image' => 'required|file|max:5000',
      ];
    }

    public function messages()
    {
        return [
          'image.file' => 'Оберіть дійсний файл зображення',
          'image.max' => 'Зображення занадто велике для завантаження, оберіть зображення розміром до 5Mb',
          'user_id.required' => 'Заявку можуть подавати виключно зареєстровані користувачі',
          'user_id.unique' => 'Заявку можна відправити лише раз. Скоріш за все Ви вже зробили це раніше',

        ];
    }
}
