<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\User;
use App\Models\Post;

class UserTest extends TestCase
{
    use DatabaseMigrations;
    
    /**
     * Test if migration and model are configured correctelly.
     *
     * @return void
     */
    public function testSanity()
    {
        $user = factory(User::class)->create();
        
        $this->assertTrue($user->exists);
        
        // Assert relationship with Post model is well defined.
        
        $post = $user->posts()->save(
            factory(Post::class)->make()
        );
        
        $this->assertTrue($post->exists);
    }
}