<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'parent_id',
        'content'
    ];

    // Bu kaydın bir üst menüsü var mı?
    public function parent()
    {
        return $this->belongsTo(Page::class, 'parent_id');
    }

    // Bu kaydın alt menüleri var mı?
    public function children()
    {
        return $this->hasMany(Page::class, 'parent_id');
    }
}
