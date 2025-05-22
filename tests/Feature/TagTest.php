<?php

namespace Italofantone\Taxonable\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Italofantone\Taxonable\Models\Tag;
use Italofantone\Taxonable\Tests\Models\TestModel;
use Italofantone\Taxonable\Tests\TestCase;

class TagTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_attach_tags_to_a_model()
    {
        $tag = Tag::create(['name' => 'Test Tag']);
        $model = TestModel::create();

        $model->addTag($tag);

        $this->assertDatabaseHas('taggables', [
            'tag_id' => $tag->id,
            'taggable_id' => $model->id,
            'taggable_type' => TestModel::class,
        ]);

        $this->assertCount(1, $model->tags);
    }

    public function test_it_can_detach_tags_from_a_model()
    {
        $tag = Tag::create(['name' => 'Test Tag']);
        $model = TestModel::create();

        $model->addTag($tag);
        $model->removeTag($tag);

        $this->assertDatabaseMissing('taggables', [
            'tag_id' => $tag->id,
            'taggable_id' => $model->id,
            'taggable_type' => TestModel::class,
        ]);

        $this->assertCount(0, $model->tags);
    }

    public function test_it_can_sync_tags_on_a_model()
    {
        $tag_1 = Tag::create(['name' => 'Tag 1']);
        $tag_2 = Tag::create(['name' => 'Tag 2']);
        $tag_3 = Tag::create(['name' => 'Tag 3']);

        $model = TestModel::create();

        $model->addTag([$tag_1, $tag_2]);

        $this->assertCount(2, $model->tags);

        $model->syncTags($tag_3);
        $model->load('tags');

        $this->assertCount(1, $model->tags);
    }
}