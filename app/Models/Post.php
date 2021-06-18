<?php

namespace App\Models;

use App\Http\Controllers\CategoryController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public $table = 'post';

    protected $fillable = ['title' , 'description' , 'user_id', 'category_id' , 'author'];
    public function getCategory ()
    {
        return $this->belongsTo(CategoryController::class);
    }

}
