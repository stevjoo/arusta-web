<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model

{

    protected $table = 'review_ratings';
    use HasFactory;
    protected $fillable = ['user_id','star_rating','comments','status'];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
