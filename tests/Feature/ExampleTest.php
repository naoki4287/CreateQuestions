<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
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

    // // $response->assertStatus(200); // 302にしてみる
    // $this->get('/hoge')->assertStatus(404);
    // $this->get('/create')->assertOk();
    // $this->get('/questions/{id}')->assertOk();
    // $this->get('/questionlist/{id}')->assertOk();
    // $this->get('/add/{id}')->assertOk();
    // // $this->post('/delete')->assertOk();


    // $users = [
    //   'id' => 2,
    //   'name' => 'wakabashi',
    //   'email' => 'waka@bayashi',
    // ];
    // $this->assertDatabaseHas('users', $users);

    
  }
}
