<?php

namespace Italofantone\Taxonable\Models;

use Illuminate\Database\Eloquent\Model;
use Italofantone\Sluggable\Sluggable;

class Tag extends Model
{
    use Sluggable;

    protected $fillable = ['name', 'description'];

    protected $slugSourceField = 'name';
}