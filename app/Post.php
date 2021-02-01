<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Category;
use App\Tag;
use App\User;


class Post extends Model
{
    public function category(){

        return $this->belongsTo('App\Category');

    }

    protected $fillable = ['title','category_id','content','image','slug','user_id'];
    protected $table = 'posts';


    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    use SoftDeletes;

    public function users(){

        return $this->belongsTo('App\User','user_id','id');

    }

}
