<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return string
     */
    public function path()
    {
        return route('tag.show', $this);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
