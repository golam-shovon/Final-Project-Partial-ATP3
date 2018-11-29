<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post_report;
use App\Article;

use Illuminate\Support\Facades\DB;


class moderatorController extends Controller
{
    public function index(Request $request){
   	
   	return view('moderator.index');
   }

   public function reported_post(Request $request){

   	$post_reports=DB::table('Post_reports')
   				->where('status','moderator')->get();
   	
   	return view('moderator.reported_post')-> with('post_reports',$post_reports);
   }

   public function status_update_reported_post(Request $request){
   $statusadmin[]=$request['statusyes'];
   $statuswrong[]=$request['statusno'];

   foreach($statusadmin as $report_id){
      //$post_report=Post_report::find($report_id);
      //$post_report->status='admin';
      //$post_report->save();
      DB::table('post_reports')
               ->where('report_id',$report_id)
              ->update(['status' => 'admin']);
         
   }

   foreach($statuswrong as $report_id){
      //$post_report=Post_report::find($report_id);
      //$post_report->status='wrong';
      //$post_report->save();   
        DB::table('post_reports')
              ->where('report_id',$report_id)
              ->update(['status' => 'wrong']);
                      
   }

   return view('moderator.index');

}
   public function unverified_post(Request $request){

      $articles=DB::table('Articles')
               ->where('verification','no')->get();
      
      return view('moderator.unverified_post')-> with('articles',$articles);
   }

   public function verification_update_articles(Request $request){
      $statusadmin[]=$request['statusyes'];
      $statuswrong[]=$request['statusno'];

      foreach($statusadmin as $article_id){
      //$post_report=Post_report::find($report_id);
      //$post_report->status='admin';
      //$post_report->save();
      DB::table('articles')
               ->where('article_id',$article_id)
              ->update(['verification' => 'yes']);
         
   }

   foreach($statuswrong as $article_id){
      //$post_report=Post_report::find($report_id);
      //$post_report->status='wrong';
      //$post_report->save();   
        DB::table('articles')
              ->where('article_id',$article_id)
              ->update(['verification' => 'no']);
                      
   }

   return view('moderator.index');

}

   public function delete_post(Request $request){

      $articles=DB::table('Articles')
               ->get();
      
      return view('moderator.delete_post')-> with('articles',$articles);
   }

   public function delete_articles(Request $request){
      $statusadmin[]=$request['statusyes'];

      foreach($statusadmin as $article_id){
      //$post_report=Post_report::find($report_id);
      //$post_report->status='admin';
      //$post_report->save();
      DB::table('articles')
               ->where('article_id',$article_id)
               ->delete();
         
   }

   return view('moderator.index');

 
   }  
}
