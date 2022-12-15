<?php

use App\Http\Controllers\ProductController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $data = [
     'name'=> 'Ashik',
     'email'=>'mdashik45@gmail.com',
     'password'=>12345678
    ];
    // delete user data
   // Cache::forget('user_data');
    // get user data or fetch user data
   // dd(Cache::get('user_data'));
    //store user data
   // Cache::put('user_data',$data,now()->addMinutes(6));
    return view('welcome');
});

Route::get('students',function(){
//$date = '2022-12-03 16:33:01';
//return date('d',strtotime($date));
//return date('H:i:s',strtotime($date));
//$studentsPluck = DB::table('students')->pluck('name','id');

  /* $up=  DB::table('students')->where('id',10)->update([
         'id'=>10,
        'name'=>'Kabila',
        'roll'=>183002115,
        'subject'=>'Data Structure',
        'reg'=>201,
        'address'=>'Jatrabari',
        'mobile'=>'01668756723',
        'birthDay'=>now(),
    ]);
*/
   //DB::table('students')->upsert($data,['name','roll'],['reg']);

//return $students;
 // $student = DB::table('students')->where('id',16);
 //$students= DB::table('students')->where('name','Rahim')->distinct()->get();
 //$name = "Karim";
 //$students = DB::table('students')->when($name,function($query,$name){
 //   $query->where('name',$name);
 //})->get();
 //return $students;
 //$students = DB::table('students')->crossJoin('classes','students.class_id','=','classes.id')->get();
 //dd($students);

 //$students = DB::table('students')->get();
 //return view('student',['students'=>$students]);
 //$raw = DB::update('update classes set class_name = :class_name where id =:id', ['class_name'=>'Class E','id'=>5]);
 //$raw = DB::delete('delete from classes where id =:id',['id'=>5]);
//return $raw
});

Route::get('rt',function(){
    $rt = DB::table('routines') ->whereDate('created_at', '2016-12-31')->get();
    return $rt;
});
Route::get('/pro',[ProductController::class,'index']);
Route::get('/products',function(){
   $products = DB::table('products')->get();
   return view('products',['products'=>$products]);
});

Route::get('chack',function(){
   $pro = DB::table('students')->get();
   return view('products',['pro'=>$pro]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
//Route::group(['middleware'=>['auth','email_verify']],function(){
//Route::get('profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
//});
Route::middleware(['auth','email_verify:anis@gmail.com'])->group(function(){
Route::get('profile', [App\Http\Controllers\HomeController::class, 'profile']);
});