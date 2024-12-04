<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
   protected $table = 'events';
   protected $fillable = ['user_id','title', 'start_date', 'end_date'];

   public function user(){
      return $this->belongsTo(User::class);
  }
}
