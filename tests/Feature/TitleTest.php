<?php

namespace Tests\Feature;

use App\Models\title;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TitleTest extends TestCase
{
  /**
   * A basic feature test example.
   *
   * @return void
   */
  public function test_title()
  {
    $titles = [
      'title' => '漢字',
      'user_id' => 2
    ];

    // モデルの作成
    $title = new title();
    $title->fill($titles)->save();
    $this->assertDatabaseHas('titles', $titles);

    // モデルの更新
    $title->title = 'kannji';
    $title->save();
    $this->assertDatabaseMissing('titles', $titles);
    $titles['title'] = 'kannji';
    $this->assertDatabaseHas('titles', $titles);

    // モデルの削除
    $title->delete();
    // $this->assertDatabaseMissing('titles', $titles);
  
  }
}
