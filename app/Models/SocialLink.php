<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    use HasFactory;
    public function siteSetting()
    {
        return $this->belongsTo(SiteSetting::class);
    }
}
