<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use DB;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    //
    public function uploadvideo(Request $request){

		
        $videoupload= new Video;
		$providers = DB::table('providers')
		->get();
	foreach($providers as $provider){
						if($request->provider_name==$provider->provider_name){
								$videoupload->provider_id=$provider->provider_id;
                               
								if($provider->provider_id==1){
                                    $videoupload->provider_id=1;
									if($request->video->extension()=='mp4'){
													$validator = Validator::make($request->all(), [
												'video' => 'required|video|mimes:mp4',
												'video_name' => 'required',
											]);
											if ($validator->fails()) {
												return response()->json(['message'=>$validator,'code'=>'1'],500);
											}
												else{$videoupload->video=$request->video;
												$videoupload->video_name=$request->video_name;}
										}
										elseif($request->video->extension()=='mp3'){
													$validator = Validator::make($request->all(), [
														'video'=>'required|mime:audio/mp3|max:5000',
												'video_name' => 'required',
											]);
											if ($validator->fails()) {
												return response()->json(['message'=>$validator,'code'=>'1'],500);
											}
												else{$videoupload->video=$request->video;
												$videoupload->video_name=$request->video_name;}
										}
								} elseif($provider->provider_id==2){
									$videoupload->provider_id=2;
										if($request->video->extension()=='mp4'||$request->video->extension()=='mov'){
										$validator = Validator::make($request->all(), [
												'video' => 'required|mimes:mp4,video/quicktime|max:500000',
												'video_name' => 'required',
											]);
											if ($validator->fails()) {
												return response()->json(['message'=>$validator,'code'=>'1'],500);
											}
												else{$videoupload->video=$request->video;
												$videoupload->video_name=$request->video_name;}
													
										}

								}

							
    }

    $result=$videoupload->save();
			if($result){
				$video_upload2 = DB::table('video_upload')
		->where('video', $request->video)
		->get();
				//$data=array('provider_id'->$provider->provider_id,'name'->$request->video_name,'video_file'->$request->video_name);
				//return response()->json(['message'=>'Data saved successfully','code'=>'0','provider_id'->$provider->provider_id,'name'->$request->video_name,'video_file'->$request->video_name],200);
				return response()->json(['message'=>'Data saved successfully','code'=>'0','details'=>$video_upload2],200);
			}else{

					return response()->json(['message'=>'Failed to save video to database','code'=>'1'],500);
			}


}
}
}