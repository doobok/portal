<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InitiativeFormRules extends FormRequest
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
          'user_id' => 'required',
          'date_start' => 'required|date|after:tomorrow',
          'date_regfinish' => 'sometimes|required|date|after:tomorrow|before:date_start',
        ];
    }

    public function messages()
    {
        return [
          'user_id.required' => 'Заявку можуть подавати виключно зареєстровані користувачі',
          'date_start.after' => 'Час початку не може бути визначений раніше, як через добу з моменту подачі заявки',
          'date_regfinish.required' => 'При потребі вкажіть час завершення реєстрації',
          'date_regfinish.after' => 'Час завершення реєстрації не може бути визначений раніше, як через добу з моменту подачі заявки',
          'date_regfinish.before' => 'Час завершення реєстрації не може бути визначений пізніше часу самої події',

        ];
    }

}
