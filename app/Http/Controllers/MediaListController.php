<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class MediaListController extends Controller
{
    
    public function listMedia(){
	    $image = DB::table('image_upload')
					->orderBy('uploaded_at','desc')
                ->get();
                //print_r($image);
                
                $video = DB::table('video_upload')
                        ->orderBy('uploaded_at','desc')
                        ->get();
                        $media_collection = $image->merge($video); 
                        
                        
                        $sorted = $media_collection->sortByDesc('uploaded_at');
                        return response()->json(['message'=>'getting data','code'=>'0','mediaList'=>$sorted],200);
	
	}
    
}
