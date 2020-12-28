<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    
    public function module(){
        $this->belongsToMany(Module::class);
    }

    public function roles(){
        return $this->belongsTo(Role::class);
    }
}