<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'entity_id','entity_type','user_id'];

    public function entity() {
        return $this->morphTo();
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
