<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionsRequest extends FormRequest
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
            'amount'          => 'required|numeric|min:2',
            'holder_name'     => 'required|max:50' ,
            'card_number'     => 'required|numeric|digits:14',
            'expiry_date'     => 'required|date',
            'cvc_code'        => 'required|numeric|digits:3',
        ];
    }
}
