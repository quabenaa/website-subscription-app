<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteSubscription extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','website_id'];

    public function website()
    {
        return $this->belongsTo(Website::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFindByWebsite($query, $website)
    {
        return $query->where('website_id',$website);
    }
}
