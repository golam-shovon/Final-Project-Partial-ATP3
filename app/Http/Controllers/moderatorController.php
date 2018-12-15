<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post_report;
use App\Article;
use App\Notice;

use Illuminate\Support\Facades\DB;


class moderatorController extends Controller
{
    public function index(Request $request){
      session(['user_id' => 1]);   	
   	return view('moderator.index');
   }

   public function reported_post(Request $request){
      session(['user_id' => 1]); 
   	$post_reports=DB::table('articles')
               ->join('post_reports','post_reports.article_id','=','articles.article_id')
   				->where('post_reports.status','moderator')->get();
   	
   	return view('moderator.reported_post')-> with('post_reports',$post_reports);
   }

   public function status_update_reported_post(Request $request){
      session(['user_id' => 1]); 
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
      session(['user_id' => 1]); 

      $articles=DB::table('Articles')
               ->where('verification','no')->get();
      
      return view('moderator.unverified_post')-> with('articles',$articles);
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

   return view('moderator.index');

}

   public function delete_post(Request $request){
      session(['user_id' => 1]); 

      $articles=DB::table('Articles')
               ->get();
      
      return view('moderator.delete_post')-> with('articles',$articles);
   }

   public function delete_articles(Request $request){
      session(['user_id' => 1]); 
      $statusadmin[]=$request['statusyes'];

      foreach($statusadmin as $article_id){
      //$post_report=Post_report::find($report_id);
      //$post_report->status='admin';
      //$post_report->save();
      DB::table('articles')
               ->where('article_id',$article_id)
               ->update(['verification' => 'blocked']);
         
   }
      $articles=DB::table('Articles')
               ->get();
      
      return view('moderator.delete_post')-> with('articles',$articles);
 
   }  

   public function notice_index(Request $request){
      session(['user_id' => 1]); 
      
      return view('moderator.notice_index');
   }  

   public function create_notice_render(Request $request){
      session(['user_id' => 1]); 

      return view('moderator.notice_create');      
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
         return redirect()->route('moderator.notice');

   }

   public function low_acccuracy_post_render(Request $request){
      session(['user_id' => 1]); 
      $post_reports=DB::table('articles')
               ->join('article_accuracys','article_accuracys.article_id','=','articles.article_id')
               ->get();
      
      return view('moderator.low_acccuracy_post')-> with('post_reports',$post_reports);
   }  

    public function search(Request $request)
    {
        if($request->ajax())
        {
         $output="";
            $articles=DB::table('articles')
                     ->join('post_reports','post_reports.article_id','=','articles.article_id')
                     ->where('article','LIKE','%'.$request->search."%")
                     ->orWhere('report','LIKE','%'.$request->search."%")
                     ->get();

            if($articles)
            {
                foreach ($articles as $key => $art)
                {
                    if($art->status='moderator')
                    {
                     $output.=
                     '<tr>'.

                     '<td>'.$art->article_id.'</td>'.
                     '<td>'.$art->article.'</td>'.
                     '<td>'.$art->report.'</td>'.
                     '</tr>';

                    }
            }
            return Response($output);
         }                     
      }
   }

   public function see_notice_render(Request $request){
      session(['user_id' => 1]); 
    $notices=DB::table('notices')->get();
    
    return view('moderator.notice_see')-> with('notices',$notices);
   }   
 
   public function delete_notice(Request $request){
      session(['user_id' => 1]); 
      $statusadmin[]=$request['statusyes'];

      foreach($statusadmin as $notice_id){
      //$post_report=Post_report::find($report_id);
      //$post_report->status='admin';
      //$post_report->save();
      DB::table('notices')
               ->where('notice_id',$notice_id)
               ->delete();

      $notices=DB::table('notices')->get();
    
    return view('moderator.notice_see')-> with('notices',$notices);           
         
      }
    }
    public function searchnotice(Request $request)
    {
        if($request->ajax())
        {
         $output="";
            $articles=DB::table('notices')
                     ->where('notice_title','LIKE','%'.$request->search."%")
                     ->orWhere('notice','LIKE','%'.$request->search."%")
                     ->get();

            if($articles)
            {
                foreach ($articles as $key => $art)
                {

                     $output.=
                     '<tr>'.

                     '<td>'.$art->notice_id.'</td>'.
                     '<td>'.$art->notice_title.'</td>'.
                     '<td>'.$art->notice.'</td>'.
                     '</tr>';
            }
            return Response($output);
         }                     
      }
   }    
}
