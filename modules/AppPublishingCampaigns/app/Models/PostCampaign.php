<?php

namespace Modules\AppPublishingCampaigns\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\AppPublishingCampaigns\Database\Factories\PostCampaignFactory;

class PostCampaign extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): PostCampaignFactory
    // {
    //     // return PostCampaignFactory::new();
    // }
}
