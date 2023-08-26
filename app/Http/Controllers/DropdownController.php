<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Province;
use App\Models\City;

class DropdownController extends Controller
{
    // Inside your controller



public function getProvinces($countryId)
{
    // Retrieve provinces for the given countryId
    $provinces = Province::where('country_id', $countryId)->get();

    // Generate HTML options for the dropdown
    $options = '<option value=""> Seleccione provincia </option>';
    foreach ($provinces as $province) {
        $options .= '<option value="' . $province->id . '">' . $province->name . '</option>';
    }

    return $options;
}


    public function getCities($provinceId)
    {
        $cities = City::where('province_id', $provinceId)->get();
        $options = '<option value=""> Seleccione ciudad </option>';
        foreach ($cities as $city) {
            $options .= '<option value="' . $city->id . '">' . $city->name . '</option>';
        }
        return $options;
    }
}
