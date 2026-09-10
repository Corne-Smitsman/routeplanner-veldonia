<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreStationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        if ($this->filled('code')) {
            $this->merge(['code' => strtoupper(trim($this->input('code')))]);
        }
    }

    public function rules(): array
    {
        return [
            'code' => ['required', 'string', 'size:3', 'alpha', Rule::unique('stations', 'code')],
            'name' => ['required', 'string', 'max:255'],
            'region' => ['required', 'string', 'max:255'],
            'population' => ['required', 'integer', 'min:0', 'max:100000000'],
        ];
    }

    public function attributes(): array
    {
        return [
            'code' => 'De stationscode',
            'name' => 'De naam',
            'region' => 'De regio',
            'population' => 'Het inwoneraantal',
        ];
    }

    public function messages(): array
    {
        return [
            'code.size' => 'De stationscode bestaat uit precies 3 letters.',
            'code.alpha' => 'De stationscode mag alleen letters bevatten.',
            'code.unique' => 'Deze stationscode is al in gebruik.',
        ];
    }
}
