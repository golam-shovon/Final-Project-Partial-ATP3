<?php

namespace App\Http\Controllers;

use App\Post_report;
use App\Article;
use App\Notice;
use App\User;
use App\Article_ratings;
use App\Comment_reports;
use App\Article_saves;
use App\user_performance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class super_userController extends Controller
{
    public function index(Request $request){
      session(['user_id' => 1]);   	
   	return view('super_user.index');
   }
   
   public function reported_post(Request $request){
      session(['user_id' => 1]); 
   	$post_reports=DB::table('articles')
               ->join('post_reports','post_reports.article_id','=','articles.article_id')
   			   ->where('post_reports.status','admin')->get();
   	
   	return view('super_user.reported_post')-> with('post_reports',$post_reports);
   }

   public function status_update_reported_post(Request $request){
      session(['user_id' => 1]); 
   $statusadmin[]=$request['statusyes'];
   $statuswrong[]=$request['statusno'];

   foreach($statusadmin as $report_id){
      //$post_report=Post_report::find($report_id);
      //$post_report->status='admin';
      //$post_report->save();
   	DB::table('articles')
      ->join('post_reports','post_reports.article_id','=','articles.article_id')
   	->where('post_reports.report_id',$report_id)
   	->update(['articles.verification' => 'reported']);


      DB::table('user_performances')
      ->join('articles','articles.user_id','=','user_performances.user_id')
      ->join('post_reports','post_reports.article_id','=','articles.article_id')        
      ->where('post_reports.report_id',$report_id)
      ->increment('user_performances.reported_article');   


   }

   foreach($statuswrong as $report_id){
      //$post_report=Post_report::find($report_id);
      //$post_report->status='wrong';
      //$post_report->save();
   	DB::table('articles')
      ->join('post_reports','post_reports.article_id','=','articles.article_id')
   	->where('post_reports.report_id',$report_id)
   	->update(['articles.verification' => 'wrong']);
   }   
 
    return view('super_user.index');
                         
   }

   public function unverified_post(Request $request){
      session(['user_id' => 1]); 

      $articles=DB::table('Articles')
               ->where('verification','no')->get();
      
      return view('super_user.unverified_post')-> with('articles',$articles);
   }

   public function verification_update_articles(Request $request){
      session(['user_id' => 1]); 
      $statusadmin[]=$request['statusyes'];
      $statuswrong[]=$request['statusno'];

      foreach($statusadmin as $article_id){
      //$post_report=Post_report::find($report_id);
      //$post_report->status='admin';
      //$post_report->save();
      DB::table('articles')
               ->where('article_id',$article_id)
               ->update(['verification' => 'yes']);

      DB::table('user_performances')
      ->join('articles','articles.user_id','=','user_performances.user_id')       
      ->where('article_id',$article_id)
      ->increment('user_performances.article_verified');        


         
   }

   foreach($statuswrong as $article_id){
      session(['user_id' => 1]); 
      //$post_report=Post_report::find($report_id);
      //$post_report->status='wrong';
      //$post_report->save();   
        DB::table('articles')
              ->where('article_id',$article_id)
              ->update(['verification' => 'no']);
                      
   }

   return view('super_user.index');

   }

   public function notice_index(Request $request){
      session(['user_id' => 1]); 
      
      return view('super_user.notice_index');
   }  

   public function create_notice_render(Request $request){
      session(['user_id' => 1]); 

      return view('super_user.notice_create');      
   }  

   public function create_notice_store(Request $req){
      session(['user_id' => 1]); 
         $notice=new Notice();
         date_default_timezone_set('Asia/Dhaka');
            
         // $article->article_id=0;
         $notice->user_id=$req->session()->get('user_id');
         $notice->notice_title= $req->input('notice_title');
         $notice->notice= $req->input('notice');
         // $article->created_at=date('Y-m-d h:m:s');
         // $article->updated_at='0000-00-00 00:00:00';

         $notice->save();
         return redirect()->route('super_user.notice');

   }
  
   public function low_acccuracy_post_render(Request $request){
      session(['user_id' => 1]); 
      $post_reports=DB::table('articles')
               ->join('article_accuracys','article_accuracys.article_id','=','articles.article_id')
               ->get();
      
      return view('super_user.low_accuracy_post')-> with('post_reports',$post_reports);
   }  

   //public function user_list(Request $request){
     // session(['user_id' => 1]); 
	//$users=DB::table('users')
               //->join('articles','articles.user_id','=','users.user_id')
               //->join('article_saves','article_saves.user_id','=','users.user_id')
               //->select('articles.user_id as writer','users.user_id  as id','article_saves.user_id as save_user','users.user_id as id',DB::raw('count(*) as article, articles.user_id'),DB::raw('count(*) as article_saved , article_saves.user_id'))
			   //->groupBy('save_user')  

			   //->groupBy('writer')
            //->groupBy('id')          
               //->join('post_reports','post_reports.user_id','=','users.user_id') 
               //->join('article_ratings','article_ratings.commenter_id','=','users.user_id')
               //->join('comment_reports','comment_reports.user_id','=','users.user_id')            
               //->get();


      //return view('super_user.user_list')-> with('users',$users);
   //}  
}
