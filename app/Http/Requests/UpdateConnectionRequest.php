<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateConnectionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'from_station_id' => [
                'required', 'integer', 'exists:stations,id',
                Rule::unique('connections', 'from_station_id')
                    ->where('to_station_id', $this->input('to_station_id'))
                    ->ignore($this->route('connection')),
            ],
            'to_station_id' => ['required', 'integer', 'exists:stations,id', 'different:from_station_id'],
            'distance_km' => ['required', 'integer', 'min:1', 'max:10000'],
            'duration_minutes' => ['required', 'integer', 'min:1', 'max:10000'],
        ];
    }

    public function attributes(): array
    {
        return [
            'from_station_id' => 'Het vertrekstation',
            'to_station_id' => 'Het aankomststation',
            'distance_km' => 'De afstand',
            'duration_minutes' => 'De rijtijd',
        ];
    }

    public function messages(): array
    {
        return [
            'to_station_id.different' => 'Het vertrek- en aankomststation mogen niet hetzelfde zijn.',
            'from_station_id.unique' => 'Deze verbinding bestaat al.',
        ];
    }
}
