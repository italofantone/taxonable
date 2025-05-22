<?php

namespace Italofantone\Taxonable\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Italofantone\Taxonable\Models\Tag;
use Italofantone\Taxonable\Tests\TestCase;

class TagTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_create_a_tag()
    {
        $tag = Tag::create([
            'name' => 'Test Tag',
            'description' => 'This is a test tag',
        ]);

        $this->assertDatabaseHas('tags', [
            'name' => 'Test Tag',
            'description' => 'This is a test tag',
        ]);
    }

    public function test_it_automatically_generates_slug()
    {
        $tag = Tag::create(['name' => 'Laravel']);

        $this->assertEquals('laravel', $tag->slug);

        $this->assertDatabaseHas('tags', [
            'name' => 'Laravel',
            'slug' => 'laravel',
        ]);
    }
}