<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Note extends Model
{

    use SoftDeletes;
    protected $fillable = [
        'title',
        'description',
        'content',
        'pinned',
        'favorite',
        'archived'
    ];

    public function excerpt($length = 50)
    {
        return Str::limit($this->content, $length, '...');
    }
}
