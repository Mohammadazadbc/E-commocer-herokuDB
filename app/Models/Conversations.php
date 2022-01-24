<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversations extends Model
{
    use HasFactory;

    protected $table="conversations";
    
    public function members(){
        return $this->belongsToMany(Members::class,'conversations_members');
    }
    
}
