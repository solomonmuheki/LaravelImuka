<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveOrderRequest extends FormRequest
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
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'totalCost' => 'required|digits_between:1,9',
            'phoneNumber' => 'required',
            'tickets' => 'present|array',
            'tickets.*.id' => 'required|integer',
            'tickets.*.numberOfTickets' => 'required|integer'
        ];
    }
}
