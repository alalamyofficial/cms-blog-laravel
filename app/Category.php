<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Category extends Model
{
    protected $table = 'categories';
    
    protected $fillable = [

        'name','slug'
    ];

    public function posts(){

        return $this->hasMany('App\Post');


    }

    
    public function getRouteKeyName()
    {
        return 'slug';

        //this instread of Post::find($id) or Post::find($slug)
    }

}
