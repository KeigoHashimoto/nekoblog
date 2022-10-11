<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class Tag extends Model
{
    use HasFactory;

    protected $table="tags";

    protected $fillable = [
        'tags',
    ];

    public function articles(){
        return $this->belongsToMany(Article::class,'articleTags','tags_id','articles_id');
    }
}
