<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\user as UserModel;

class Article extends Model
{
    //
    protected $table='articles';
    //protected $fillable=['user_id','gorup_id','avatar','title','title_vn','summary','summary_vn','content','content_vn','price','status'];
    protected $fillable=['user_id','gorup_id','avatar','title','summary','content','price','status'];


    public function user()
    {
        return $this->belongsTo('App\user');
    }
   
}


