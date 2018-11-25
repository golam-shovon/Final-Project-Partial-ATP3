<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post_reports;
use Illuminate\Support\Facades\DB;


class moderatorController extends Controller
{
    public function index(Request $request){
   	
   	return view('moderator.index');
   }

   public function reported_post(Request $request){

   	$post_reports=DB::table('post_reports')
   				->where('status','moderator')->get();
   	
   	return view('moderator.reported_post')-> with('post_reports',$post_reports);
   }

   public function status_update_reported_post(Request $request){

 foreach ($request->post_reports as $post) {
 		$post=post_reports::find($post_report->report_id);
   		if(($request->statusad.'$post->report_id')==!null)
   		{
   			$post->status='admin';
   		}
 }
   }
}
