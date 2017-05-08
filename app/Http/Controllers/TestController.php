<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Validator ;
use App\Users;
use App\Post;

class TestController extends Controller
{
    
function sessionadd(Request $request){
	$request->session()->put('name',$request->name);
	echo "the value added to session ".$request->name;

}

function sessionget(Request $request){
	if($request->session()->exists('name') ){
		$value = $request->session()->get('name');
		echo "the value retrieved from session is : ".$value;}
	else echo "no data :(";

}
   public function sqlsrv(){
      //return view('login');
      $user = DB::select('select * from WFUserTbl');
      dd($user);
   }

   public function validateform(Request $request){
      print_r($request->all());
      $this->validate($request,[
         'username'=>'required|max:8',
         'password'=>'required'
      ]);
   }

   function db_raw(Request $request){

   		$users = DB::select('select * from test where username = :un',['un'=>'milad']);
   		//echo var_duwww.iran2project.blogfa.commp($users);
   		foreach ($users as $user) {
   			echo "username : ".$user->username;
   			echo "\t  , time : ".$user->time;
   			echo nl2br("\n");
   		}
   }

   function db_query(Request $request){
   	//$users = DB::table('test')->where('username','milad')->orderBy('time','desc')->get();
      //$users = Users::all();
      $users = Users::find([1,2,3]);
      echo $users->count();
      foreach ($users as $user) {
         echo nl2br("\n");
         echo $user->username;
         
      }
      //echo dd($users); 
      //echo var_dump($users[0]);
   }


   Public function orm(Request $request){
      $user = Users::find(1);
      foreach ($user->posts as $post) {
         echo $post;
         echo $post->title;
         echo nl2br("\n");
      }
      $post = Post::find(6);
      echo $post->user->username;
     // echo nl2br("\t");
   }

   public function insert_redis(Request $request){
         $key = $request->key;
         $value = $request->value;
         Redis::set($key,$value);

   }

     public function show_redis(Request $request){
      $key = $request->key;
      $values = Redis::get($key);
      var_dump($values);
     


   }

   public function apiget(Request $request){
      //$info = $request->input('username');
      $info = Input::get('username');
      return response()->json(['status'=>'OK','request'=>$info ]);
   }



   public function showcomments(Request $request){
            $users = DB::table('posts')->join('users','users.username','=','posts.user_username')->get();
            return view('showposts',compact('users'));
            //dd($users);

     }

   public function sentcommentform(Request $request){
      return view('formpost');
   
   }
   public function sentcomment(Request $request){
      //echo $request->input('username','Unknow');
      
      $inputs = [
         "username" => Input::get('username'),
         "title" => Input::get('title'),
         "body" => Input::get('body'),

      ];

      $rules = [
         "username" => "required",
         "title" => "required|max:10",
         "body" => "required|max:60"
      ];

      $messages = [
         "required" => ":attribute field is required",
         "max" => "max character for :attribute is :max",
      ];
      $validator = Validator::make(Input::all(), $rules, $messages);

      if($validator->passes()){
            $user_username = Input::get('username');
            $title = Input::get('title');
            $body = Input::get('body');
            DB::table('posts')->insert(['user_username' => $user_username , 'title' => $title , 'text' => $body]);
            return redirect()->route('showcomments');

      }
      else{
         //$errors = $validator->errors();
         return back()->withErrors($validator)->withInput();
         //return view('formpost',compact('errors'));
      }
  }
 

 }