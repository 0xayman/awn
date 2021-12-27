<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function ideas()
    {
        return $this->belongsToMany(Idea::class, 'idea_tag', 'tag_id', 'idea_id');
    }
}
