<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversations extends Model
{
    use HasFactory;

    protected $table="conversations";
    
    public function member(){
        return $this->belongsToMany(Conversations::class,'conversations_members');
    }
}
