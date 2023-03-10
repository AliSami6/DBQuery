<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    public static function get_students(){
         return Cache::remember('students', now()->addHours(4), function () {
            return  DB::table('students')->orderBy('id','desc')->get();

        });
    }
    public static function cache_forget(){
        return Cache::forget('students');
    }
    public static function boot(){
        parent::boot();
        static::created(function(){
           self::cache_forget();
        });
         static::updated(function(){
           self::cache_forget();
        });
         static::deleted(function(){
           self::cache_forget();
        });
    }
}