<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\Division;
use App\Models\District;
use App\Models\Tehsil;
use App\Models\UnionCouncil;

use Illuminate\Http\Request;

class RequestDataController extends Controller
{
    public function getDivisions($province_id)
    {
        $divisions = Division::where('province_id', $province_id)->get();
        return response()->json($divisions);
    }

    public function getDistricts($division_id)
    {
        $districts = District::where('division_id', $division_id)->get();
        return response()->json($districts);
    }

    public function getTehsils($district_id)
    {
        $tehsils = Tehsil::where('district_id', $district_id)->get();
        return response()->json($tehsils);
    }

    public function getUnionCouncils($tehsil_id)
    {
        $union_councils = UnionCouncil::where('tehsil_id', $tehsil_id)->get();
        return response()->json($union_councils);
    }

}
