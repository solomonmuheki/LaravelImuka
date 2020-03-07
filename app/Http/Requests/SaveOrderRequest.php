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
<<<<<<< HEAD
            'email' => 'required|email', 
=======
            'email' => 'required|email',
>>>>>>> 65057f170880112619cc6007bb1c01d552039189
            'totalCost' => 'required|digits_between:1,9',
            'phoneNumber' => 'required',
            'tickets' => 'present|array',
            'tickets.*.id' => 'required|integer',
            'tickets.*.numberOfTickets' => 'required|integer'
        ];
    }
}
