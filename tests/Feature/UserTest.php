<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
  // use RefreshDatabase;
  /**
   * A basic feature test example.
   *
   * @return void
   */
  public function test_user()
  {
    $this->seed(DatabaseSeeder::class);
    $user = User::find(1);
    $user = User::find(2);
    $users = $user->toArray();

    $users = [
      'id' => 3,
      'name' => 'kaneki',
      'email' => 'kaneki@kirisima',
      'password' => 'sikatanaiyone'
    ];
    // モデルの作成
    $user = new User();
    $user->fill($users)->save();
    $this->assertDatabaseHas('users', $users);

    // モデルの更新
    $user->name = 'Not-kaneki';
    $user->save();
    $this->assertDatabaseMissing('users', $users);
    $users['name'] = 'Not-kaneki';
    $this->assertDatabaseHas('users', $users);

    // モデルの削除
    // $user->delete();
    // $this->assertDatabaseMissing('users', $users);
  }
}
