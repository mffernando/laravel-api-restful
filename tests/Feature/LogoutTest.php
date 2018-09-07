<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LogoutTest extends TestCase
{
    /**
     * user logout prooperly
     *
     * @return void
     */
     public function testUserIsLoggedOutProperly()
     {
         $user = factory(User::class)->create([ 'email' => 'admin5@admin.com' ]);
         $token = $user->generateToken();
         $headers = ['Authorization' => "Bearer $token"];
         $this->json('post', '/api/logout', [], $headers)->assertStatus(200);
         $user = User::find($user->id);
         $this->assertEquals(null, $user->api_token);
     }
     /**
      * test user with null token
      *
      * @return void
      */
      public function testUserWithNullToken()
      {
          // Simulating login
          $user = factory(User::class)->create([ 'email' => 'admin5@admin.com' ]);
          $token = $user->generateToken();
          $headers = ['Authorization' => "Bearer $token"];
          // Simulating logout
          $user->api_token = null;
          $user->save();
          $this->json('get', '/api/users', [], $headers)->assertStatus(500);
      }
}
