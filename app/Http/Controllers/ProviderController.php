<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;


class ProviderController extends Controller
{
    //
    public function getProvider()
    {
        $result=DB::table('providers')
        
            ->join('providers_description','providers.provider_id','=','providers_description.provider_id')
    ->select('providers.provider_id as provider_id','providers.provider_name as providerName' , 'providers_description.filetype as fileType' , 'providers_description.description as description')
    ->get();

    return response()->json(['message'=>'Success','code'=>'0','data'=>$result],200);
    }
}
