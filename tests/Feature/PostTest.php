<?php

namespace Tests\Feature;

use App\Models\BlogPost;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;
    public function test_no_blog_post_when_database_empty()
    {
        $response = $this->get('/');

        $response->assertSeeText('No Posts');
    }

    public function test_see_1_blog_post_when_there_is_one()
    {
        //Arrange part
        $post = new BlogPost();
        $post->title = 'New Blog Post';
        $post->content = 'The content of the new blog post';
        $post->save();

        //Act
        $response = $this->get('/');

        //Assert
        $response->assertSeeText('New Blog Post');

        $this->assertDatabaseHas('blog_posts', [
            'title' => 'New Blog Post'
        ]);
    }

    public function testStoreValid()
    {
        $params = [
            'title' => 'Valid title',
            'content' => 'At least 10 characters'
        ];

        $this->post('/posts', $params)->assertStatus(302)->assertSessionHas('message');

        $this->assertEquals(session('message'), 'Post Created Successfully!');
    }
}
