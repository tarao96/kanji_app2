<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CreateEventTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_イベント情報保存()
    {
        $response = $this->post(route('event.create'), [
            'name' => 'テストイベント',
            'description' => 'テストイベントの説明',
            'date' => "2021-01-01 19:00:00\n2021-01-02 19:00:00\n2021-01-03 19:00:00"
        ]);

        $response->assertStatus(302);
        // イベントテーブル確認
        $this->assertDatabaseHas('events', [
            'name' => 'テストイベント',
            'description' => 'テストイベントの説明'
        ]);
        // イベント日時テーブル確認
        $this->assertDatabaseHas('event_dates', [
            'event_id' => 1,
            'date' => '2021-01-01 19:00:00'
        ]);
        $this->assertDatabaseHas('event_dates', [
            'event_id' => 1,
            'date' => '2021-01-02 19:00:00'
        ]);
        $this->assertDatabaseHas('event_dates', [
            'event_id' => 1,
            'date' => '2021-01-03 19:00:00'
        ]);
    }
}
