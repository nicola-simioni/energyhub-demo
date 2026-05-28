<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['site_id', 'value', 'type', 'recorded_at'])]

class Reading extends Model
{
    public function site() 
    {
        return $this->belongsTo(Site::class);
    }
}
