<?php

namespace Modules\Admin\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use Modules\Core\Models\Location\Commune;
use Modules\Core\Models\Location\Country;
use Modules\Core\Models\Location\District;
use Modules\Core\Models\Location\Province;

class Index extends Controller
{
    public function getCountryById($id)
    {
        $country = Country::findOrFail($id);

        return response()->json($country);
    }

    public function getProvinceByCountryId($country_id)
    {
        $province = Province::where('country_id', $country_id)->orderBy('name', 'asc')->get();

        return response()->json($province);
    }

    public function getDistrictByProvinceId($province_id)
    {
        $district = District::where('province_id', $province_id)->orderBy('name', 'asc')->get();

        return response()->json($district);
    }

    public function getCommuneByDistrictId($district_id)
    {
        $commune = Commune::where('district_id', $district_id)->orderBy('name', 'asc')->get();

        return response()->json($commune);
    }
}
