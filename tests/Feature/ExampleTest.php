<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ExampleTest extends TestCase
{
  // use RefreshDatabase;
  /**
   * A basic test example.
   *
   * @return void
   */
  public function test_the_application_returns_a_successful_response()
  {
    // $response = $this->get('/');
    $this->get('/')->assertStatus(302);
    // $response->assertStatus(302);

    // $name =  Auth::user()->name;
    $user = User::find(2);

    // $response->assertStatus(200); // 302にしてみる
    $this->get('/hoge')
      ->assertStatus(404);
      // $this->get(route('questions', ['id' => 8]))->assertOk();
    $this->actingAs($user)
      ->get('/create')
      ->assertOk();
    $this->actingAs($user)
      ->get('/questions/1')
      ->assertOk();
    $this->actingAs($user)
      ->get('/questionlists/1')
      ->assertOk();
    $this->actingAs($user)
      ->get('/add/1')
      ->assertOk();
    // $this->actingAs($user)
    //   ->post('/delete', ['titleID' => 2]);
  }

}
