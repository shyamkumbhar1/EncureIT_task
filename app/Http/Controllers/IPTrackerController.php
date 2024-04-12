<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Stevebauman\Location\Facades\Location;

class IPTrackerController extends Controller
{
    public function track(Request $request)
    {
    $public_ip = $request->ip();
    // $public_ip = '113.193.119.116';

        if ($data = Location::get($public_ip)) {

        } else {
            // Failed retrieving position.
        }


    if(isset($data->cityName)) {

        $cookie_data = [
            'ip' => $public_ip,
            'city' => $data->cityName,
            'state' => $data->regionName,
        ];
    } else {

        $cookie_data = [
            'ip' => $public_ip,
            'city' => 'Unknown',
            'state' => 'Unknown',
        ];
    }

    // Set the cookie
    $minutes = 60 * 24; // 1 day
    return response()
        ->view('ip', $cookie_data)
        ->cookie('ip_data', json_encode($cookie_data), $minutes);
    }
}
