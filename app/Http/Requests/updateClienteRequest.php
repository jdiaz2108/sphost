<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class updateClienteRequest extends FormRequest
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
        $cliente = $this->get('cliente');
        return [
            // dd($this->route('cliente')),
            'nombre' => 'required|string|max:255',
            'nit' => 'required|'.Rule::unique('clientes')->ignore($this->route('cliente')).'|max:255',
            'correo' => 'required|string|email|'.Rule::unique('clientes')->ignore($this->route('cliente')).'|max:255',
        ];
    }

    public function attributes()
    {
        return [
            'nit'        => 'numero identificador',
        ];
    }


}
