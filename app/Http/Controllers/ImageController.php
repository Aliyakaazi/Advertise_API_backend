<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use DB;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    //
    public function uploadImage(Request $request){

		
        $imageupload= new Image;
		$providers = DB::table('providers')
		->get();
	foreach($providers as $provider){
						if($request->provider_name==$provider->provider_name){
								$imageupload->provider_id=$provider->provider_id;
                               
								if($provider->provider_id==1){
                                    $imageupload->provider_id=1;
										if( $request->image->extension()=='jpg'){
											$validator = Validator::make($request->all(), [
												'image' => 'required|image|mimes:jpg|max:2000|dimensions:ratio=4/3',
												'image_name' => 'required',
											]);
											if ($validator->fails()) {
												return response()->json(['message'=>$validator,'code'=>'1'],500);
											}
												else{$imageupload->image=$request->image;
												$imageupload->image_name=$request->image_name;}
										}
								} elseif($provider->provider_id==2){
									$imageupload->provider_id=2;
										if($request->image->extension()=='jpg'||$request->image->extension()=='gif'){
											$validator = Validator::make($request->all(), [
												'image' => 'required|image|mimes:jpg,gif|max:5000|dimensions:ratio=16/9',
												'image_name' => 'required',
											]);
											if ($validator->fails()) {
												return response()->json(['message'=>$validator,'code'=>'1'],500);
											}
												else{$imageupload->image=$request->image;
												$imageupload->image_name=$request->image_name;}
										}

								}

							
    }

    $result=$imageupload->save();
			if($result){
				$image_upload2 = DB::table('image_upload')
		->where('image', $request->image)
		->get();
				//$data=array('provider_id'->$provider->provider_id,'name'->$request->image_name,'image_file'->$request->image_name);
				//return response()->json(['message'=>'Data saved successfully','code'=>'0','provider_id'->$provider->provider_id,'name'->$request->image_name,'image_file'->$request->image_name],200);\
				return response()->json(['message'=>'data saved succesfully','code'=>'0','image'=>$image_upload2],200);
			}else{

					return response()->json(['message'=>'Failed to save image to database','code'=>'1'],500);
			}


}
}
}