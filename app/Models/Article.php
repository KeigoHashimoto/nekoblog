<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Article extends Model
{
    use HasFactory;

    protected $table='articles';

    protected $fillable = [
        'title',
        'content',
        'image',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
