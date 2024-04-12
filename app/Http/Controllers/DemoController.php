<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demo;

class DemoController extends Controller
{
    public function index (){
        $data = Demo::all();
        return view('demo',compact('data'));
    }
    public function store(Request $request)
    {
        $startTime = microtime(true);

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);


        $demo = new Demo;
        $demo->first_name = $request->first_name;
        $demo->last_name = $request->last_name;
        $demo->execution_time = microtime(true) - $startTime;
        $demo->save();

        return redirect()->back()->with('success', 'Data saved successfully!');
    }
}
