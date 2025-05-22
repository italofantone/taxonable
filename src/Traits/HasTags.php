<?php

namespace Italofantone\Taxonable\Traits;

use Italofantone\Taxonable\Models\Tag;

trait HasTags
{
    public function addTag($tag)
    {
        return $this->tags()->attach($tag);
    }

    public function removeTag($tag)
    {
        return $this->tags()->detach($tag);
    }

    public function syncTags($tags)
    {
        return $this->tags()->sync($tags);
    }

    public function tags(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}