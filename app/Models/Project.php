<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Project extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];

    // public function category(): BelongsTo {
    //     return $this->belongsTo(Category::class);
    // }
    public function category(): BelongsTo { // Cambia HasMany por BelongsTo
        return $this->belongsTo(Category::class);
    }
}
