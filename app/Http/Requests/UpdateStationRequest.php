<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $station = $this->route('station');

        return [
            'code' => 'required|alpha|size:3|uppercase|unique:stations,code,' . $station->id,
            'name' => 'required|max:255',
            'region' => 'required|max:255',
            'population' => 'required|integer|min:0',
        ];
    }

    public function attributes()
    {
        return [
            'code' => 'De stationscode',
            'name' => 'De naam',
            'region' => 'De regio',
            'population' => 'Het inwoneraantal',
        ];
    }

    public function messages()
    {
        return [
            'code.size' => 'De stationscode bestaat uit precies 3 letters.',
            'code.alpha' => 'De stationscode mag alleen letters bevatten.',
            'code.uppercase' => 'Gebruik hoofdletters voor de stationscode.',
            'code.unique' => 'Deze stationscode is al in gebruik.',
        ];
    }
}
