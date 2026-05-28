<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User as User;
use App\Models\Reading as Reading;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['name', 'location', 'user_id'])]

class Site extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function readings()
    {
        return $this->hasMany(Reading::class);
    }
}