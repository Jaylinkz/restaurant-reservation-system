<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    use HasFactory;
    protected $fillable =(['name','image','description','price']);
    public function category(){
        return $this->belongsToMany(category::class,'category_menu');
    }
}
