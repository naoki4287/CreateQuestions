<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $users = [
      'name' => 'ゲスト',
      'email' => 'guest@user',
      'password' => 'password123'
    ];
    DB::table('users')->insert($users);
    $users = [
      'name' => 'wakabayashi',
      'email' => 'waka@bayashi',
      'password' => 'password'
    ];
    DB::table('users')->insert($users);
  }
}
