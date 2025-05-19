<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    /** @use HasFactory<\Database\Factories\ListingFactory> */
    use HasFactory;

    protected $fillable = [
        "user_id",
        "title",
        "tags",
        "company",
        "location",
        "email",
        "website",
        "description",
        "photo"
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
