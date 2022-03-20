<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'content', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Goods()
    {
        return $this->hasMany(Good::class, 'post_id');
    }

    public function is_good_by_auth_user()
  {
    $id = Auth::id();

    $good_users = array();
    foreach($this->goods as $good) {
        array_push($good_users, $good->user_id);
    }

    if (in_array($id, $good_users)) {
        return true;
    } else {
        return false;
    }
  }
}
