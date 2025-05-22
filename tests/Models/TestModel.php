<?php

namespace Italofantone\Taxonable\Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Italofantone\Taxonable\Traits\HasTags;

class TestModel extends Model
{
    use HasTags;
}