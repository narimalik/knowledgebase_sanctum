<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comments_detail',
        'parent_comment_id',
        'article_id',
        'added_by',
        'updated_by',
    ];


}
