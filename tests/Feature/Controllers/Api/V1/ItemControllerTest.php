<?php

namespace Tests\Feature\Controllers\Api\V1;

use App\Models\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelJsonApi\Testing\MakesJsonApiRequests;
use Tests\TestCase;

class ItemControllerTest extends TestCase
{
    use RefreshDatabase;
    use MakesJsonApiRequests;

    /**
     * @test
     * @group ItemController
     * @return void
     */
    public function test_to_fetch_list()
    {
        $items = Item::factory()->count(3)->create();

        $response = $this
            ->jsonApi()
            ->expects('items')
            ->get('/api/v1/items');

        $response->assertFetchedMany($items);
    }

    /**
     * @test
     * @group ItemController
     * @return void
     */
    public function test_to_create_one()
    {
        $item = Item::factory()->make();

        $data = [
            'type' => 'items',
            'attributes' => [
                'title' => $item->title,
                'content' => $item->content,
                'attachment' => $item->attachment,
            ],
        ];

        $response = $this
            ->jsonApi()
            ->expects('items')
            ->withData($data)
            ->post('/api/v1/items');

        $id = $response
            ->assertCreatedWithServerId(route('v1.items.store'), $data)
            ->id();

        $this->assertDatabaseHas('items', [
            'id' => $id,
            'title' => $item->title,
            'content' => $item->content,
            'attachment' => $item->attachment,
        ]);
    }

    /**
     * @test
     * @group ItemController
     * @return void
     */
    public function test_to_fetch_one()
    {
        $item = Item::factory()->create();
        $self = route('v1.items.show', $item->getRouteKey());

        $expected = [
            'type' => 'items',
            'id' => (string)$item->getRouteKey(),
            'attributes' => [
                'title' => $item->title,
                'content' => $item->content,
                'attachment' => $item->attachment,
                'createdAt' => $item->created_at->toDateTimeString(),
                'updatedAt' => $item->updated_at->toDateTimeString(),
            ],
            'links' => [
                'self' => $self,
            ],
        ];

        $response = $this
            ->jsonApi()
            ->expects('items')
            ->get($self);

        $response->assertFetchedOneExact($expected);
    }

    /**
     * @test
     * @group ItemController
     * @return void
     */
    public function test_to_update_one()
    {
        $item = Item::factory()->create();

        $data = [
            'type' => 'items',
            'id' => (string)$item->getRouteKey(),
            'attributes' => [
                'title' => 'Updated item!',
                'content' => 'This is new item content.',
                'attachment' => null,
            ],
        ];

        $this
            ->jsonApi()
            ->expects('items')
            ->withData($data)
            ->patch(route('v1.items.update', $item->getRouteKey()));

        $this->assertDatabaseHas('items', [
            'id' => $item->getKey(),
            'title' => $data['attributes']['title'],
            'content' => $data['attributes']['content'],
            'attachment' => $data['attributes']['attachment'],
        ]);
    }

    /**
     * @test
     * @group ItemController
     * @return void
     */
    public function test_to_delete_one()
    {
        $item = Item::factory()->create();

        $response = $this
            ->jsonApi()
            ->delete(route('v1.items.destroy', $item->getRouteKey()));

        $response->assertNoContent();

        $this->assertDatabaseMissing('items', [
            'id' => $item->getKey(),
        ]);
    }

    /**
     * @test
     * @group ItemController
     * @return void
     */
    public function test_to_delete_all()
    {
        $items = Item::factory()->count(5)->create();

        $response = $this
            ->jsonApi()
            ->delete(route('v1.items.purge'));

        $response->assertNoContent();

        $items->each(function ($item) {
            $this->assertDatabaseMissing('items', [
                'id' => $item->getKey(),
            ]);
        });
    }
}
