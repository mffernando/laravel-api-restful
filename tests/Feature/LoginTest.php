<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class LoginTest extends TestCase
{
    /**
     * Test email and login required
     *
     * @return void
     */
     public function testRequiresEmailAndLogin()
     {
         $this->json('POST', 'api/login')
             ->assertStatus(422)
             ->assertJson([
                 'email' => [ 'The email field is required.' ],
                 'password' => [ 'The password field is required.' ],
             ]);
     }

     /**
      * Test login successfully
      *
      * @return void
      */
     public function testUserLoginsSuccessfully()
     {
         $user = factory(User::class)->create([
             'email' => 'admin5@admin.com',
             'password' => bcrypt('secret'),
         ]);
         $payload = ['email' => 'admin5@admin.com', 'password' => 'secret'];
         $this->json('POST', 'api/login', $payload)
             ->assertStatus(200)
             ->assertJsonStructure([
                 'data' => [
                     'id',
                     'name',
                     'username',
                     'email',
                     'created_at',
                     'updated_at',
                     'api_token',
                 ],
             ]);
     }
 }
