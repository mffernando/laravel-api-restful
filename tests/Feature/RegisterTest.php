<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegisterTest extends TestCase
{
    /**
     * Test register successfully
     *
     * @return void
     */
     public function testsRegistersSuccessfully()
     {
         $payload = [
             'name' => 'administrator5',
             'username' => 'admin5',
             'email' => 'admin5@admin.com',
             'password' => 'secret',
             'password_confirmation' => 'secret',
         ];
         $this->json('post', '/api/register', $payload)
             ->assertStatus(201)
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
             ]);;
     }

     /**
      * Test password email name username password required
      *
      * @return void
      */
     public function testsRequiresPasswordEmailAndName()
     {
         $this->json('post', '/api/register')
             ->assertStatus(422)
             ->assertJson([
                 'name' => [ 'The name field is required.' ],
                 'username' => [ 'The username field is required.' ],
                 'email' => [ 'The email field is required.' ],
                 'password' => [ 'The password field is required.' ],
             ]);
     }

     /**
      * Test password confirmation
      *
      * @return void
      */
      public function testsRequirePasswordConfirmation()
      {
          $payload = [
              'name' => 'administrator5',
              'username' => 'admin5',
              'email' => 'admin5@admin.com',
              'password' => 'secret',
              'password_confirmation' => 'secret',
          ];
          $this->json('post', '/api/register', $payload)
              ->assertStatus(422)
              ->assertJson([
                  'password' => [ 'The password confirmation does not match.' ],
              ]);
      }
}
