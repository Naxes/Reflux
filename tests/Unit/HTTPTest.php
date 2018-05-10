<?php

namespace Tests\Unit;

use App\User;
use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HTTPTest extends TestCase
{    
    /*
    |--------------------------------------------------------------------------
    | Guest User Tests
    |--------------------------------------------------------------------------
    */
    
    /* Homepage */
    public function testGuestUserHome()
    {
        $response = $this->get('/')
                         ->assertStatus(200);
    }

    /* Registration */
    public function testGuestUserRegister()
    {
        $response = $this->get('/register')
                         ->assertStatus(200);
    }

    /* Login */
    public function testGuestUserLogin()
    {
        $response = $this->get('/login')
                         ->assertStatus(200);
    }

    /* Valid Credentials */
    public function testGuestValidCredentials()
    {
        $this->assertCredentials(['name' => 'Naxes', 'password' => 'tester'], $guard = null);
    }

    /* Invalid Credentials */
    public function testGuestValidInvalidCredentials()
    {
        $this->assertInvalidCredentials(['name' => 'InvalidUser', 'password' => 'tester'], $guard = null);
    }

    /* User Profiles */
    public function testGuestUserUserProfile()
    {
        $response = $this->get('/Naxes')
                         ->assertStatus(200);
    }

    /* User Settings */
    public function testGuestUserUserSettings()
    {
        $response = $this->get('/edit/Naxes')
                         ->assertStatus(302);
    }

    /* Content Submission */
    public function testGuestUserContentSubmission()
    {
        $response = $this->get('/posts/create')
                         ->assertStatus(302);
    }

    /* Content Modification */
    public function testGuestUserContentModification()
    {
        $response = $this->get('/posts/edit/1')
                         ->assertStatus(302);
    }

    /*
    |--------------------------------------------------------------------------
    | Auth User Tests
    |--------------------------------------------------------------------------
    */

    /* Homepage */
    public function testAuthUserHompage()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                         ->withSession(['foo' => 'bar'])
                         ->get('/')
                         ->assertStatus(200);
    } 

    /* Registration */
    public function testAuthUserRegister()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                         ->withSession(['foo' => 'bar'])
                         ->get('/register')
                         ->assertStatus(302);
    }    

    /* Login */
    public function testAuthUserLogin()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                         ->withSession(['foo' => 'bar'])
                         ->get('/login')
                         ->assertStatus(302);
    }

    /* User Profiles */
    public function testAuthUserUserProfile()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                         ->withSession(['foo' => 'bar'])
                         ->get('/' . $user->name)
                         ->assertStatus(200);
    }

    /* User Settings (Auth Settings) */
    public function testAuthUserUserSettings1()
    {
        $user = factory(User::class)->create();
        
        $response = $this->actingAs($user)
                         ->withSession(['foo' => 'bar'])
                         ->get('/edit/' . $user->name)                       
                         ->assertStatus(200);                         
    }

    /* User Settings (Other Settings) */
    public function testAuthUserUserSettings2()
    {
        $user = factory(User::class)->create();
        
        $response = $this->actingAs($user)
                         ->withSession(['foo' => 'bar'])
                         ->get('/edit/Naxes')                       
                         ->assertStatus(302);                         
    }

    /* Content Submission */
    public function testAuthUserContentSubmission()
    {
        $user = factory(User::class)->create();
        
        $response = $this->actingAs($user)
                         ->withSession(['foo' => 'bar'])
                         ->get('/posts/create')                       
                         ->assertStatus(200);
    }

    /* Creating a Post */
    public function testContentSubmission()
    {
        $post = factory(Post::class)->make();
        $users = factory(User::class)
           ->create()
           ->each(function ($u) use ($post) {
                $u->post()->save($post);
            });
            
        $this->assertDatabaseHas('posts', ['title' => $post->title]);             
    }
}
