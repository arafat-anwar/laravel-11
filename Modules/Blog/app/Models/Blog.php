<?php

namespace Modules\Blog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'code',
        'title',
        'thumbnail',
        'blog',
        'user_id',
        'deleted_at',
    ];

    public function user(){
        return $this->belongsTo(\App\Models\User::class);
    }
}
