<?php

namespace App\Http\Requests;

use App\Services\TypeService;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;


class AppRequest extends FormRequest
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
        $types = TypeService::get();
        $codes = $types->pluck('code')->toArray();

        return [
            'service_type' => Rule::in($codes),
            'start_date' => 'date_format:Y-m-d',
            'end_date' => 'date_format:Y-m-d',
            'page_number' => 'integer|min:1',
            'page_size' => 'integer|min:1',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'service_type' => 'tipo del servicio',
            'start_date' => 'fecha de inicio',
            'end_date' => 'fecha final',
            'page_number' => 'número de página',
            'page_size' => 'cantidad de registros',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'service_type.in' => 'El :attribute seleccionado no existe',
            'start_date.date_format' => 'La :attribute es inválida',
            'end_date.date_format' => 'La :attribute es inválida',
            'page_number.integer' => 'El :attribute debe ser un número entero',
            'page_number.min' => 'El :attribute debe ser :value como mínimo',
            'page_size.integer' => 'La :attribute debe ser un número entero',
            'page_size.min' => 'La :attribute debe ser :value como mínimo',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        return redirect('/')
        ->withErrors($validator)
        ->withInput();
    }
}
