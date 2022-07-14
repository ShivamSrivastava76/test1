<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function index()
    {
        $response = Http::get('http://147.182.167.30/drug1.json');
        $data = DB::table('test')->paginate(10);
        return view('welcome')->with('response',$response)->with('data',$data);
    }
    
    public function save(Request $resuest)
    {
       $insert_data = [
           'DOB' => $resuest->birthday,
           'Age' => $resuest->gestationalAge,
           'Sex' => $resuest->sex,
           'Height' => $resuest->height,
           'Weight' => $resuest->weight,
           ];
        $data = DB::table('test')->insert($insert_data);   
        return redirect()->back()->with('message', 'Success!!');
    }
    
}
