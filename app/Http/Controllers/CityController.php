<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->q;
        $employees = City::orderby('city_name', 'asc')->select('id', 'city_name')->limit(5)->get();
        $response = null;
        if ($search == '') {
            $employees = City::orderby('city_name', 'asc')->select('id', 'city_name')->limit(5)->get();
        } else {
            $employees = City::orderby('city_name', 'asc')->select('id', 'city_name')->where('city_name', 'like', '%' . $search . '%')->limit(5)->get();
        }

        foreach ($employees as $employee) {
            $response[] = [
                "id" => $employee->id,
                "text" => $employee->city_name
            ];
        }
        return json_encode($response);
    }
}
