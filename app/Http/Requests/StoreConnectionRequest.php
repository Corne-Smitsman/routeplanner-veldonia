<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreConnectionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'from_station_id' => 'required|exists:stations,id',
            'to_station_id' => 'required|exists:stations,id|different:from_station_id',
            'distance_km' => 'required|integer|min:1',
            'duration_minutes' => 'required|integer|min:1',
        ];
    }

    public function attributes()
    {
        return [
            'from_station_id' => 'Het vertrekstation',
            'to_station_id' => 'Het aankomststation',
            'distance_km' => 'De afstand',
            'duration_minutes' => 'De rijtijd',
        ];
    }

    public function messages()
    {
        return [
            'to_station_id.different' => 'Het vertrek- en aankomststation mogen niet hetzelfde zijn.',
        ];
    }
}
