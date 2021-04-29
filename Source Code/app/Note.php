<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable=['admin_id','body']; 
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
