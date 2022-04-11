<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Note;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    // User::factory()->create([
    //   'email' => 'admin@test.com',
    //   'password' => bcrypt(123456),
    // ]);

    Note::factory(100000)->create();
  }
}
