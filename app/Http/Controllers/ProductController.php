<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    public function index(){
        $students = Student::get_students();
        // $products = DB::table('products')->get();
   return view('student',['students'=>$students]);
    }
}