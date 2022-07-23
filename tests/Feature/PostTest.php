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

    private function createDummyBlogPost(): BlogPost
    {
        //Arrange part
        $post = new BlogPost();
        $post->title = 'New Blog Post';
        $post->content = 'The content of the new blog post';
        $post->save();

        return $post;
    }

    public function test_see_1_blog_post_when_there_is_one()
    {
        //Act
        $post = $this->createDummyBlogPost();

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

        $this->post('/posts', $params)
            ->assertStatus(302)
            ->assertSessionHas('message');

        $this->assertEquals(session('message'), 'Post Created Successfully!');
    }

    public function testStoreFail()
    {
        $params = [
            'title' => 'b',
            'content' => 'b'
        ];

        $this->post('/posts', $params)
            ->assertStatus(302)
            ->assertSessionHas('errors');

        $messages = session('errors')->getMessages();

        $this->assertEquals($messages['title'][0], 'The title must be at least 5 characters.');
        $this->assertEquals($messages['content'][0], 'The content must be at least 10 characters.');
        // dd($messages->getMessages());
    }

    public function testUpdateValid()
    {
        //Arrange part
        //first we create a sample post for our test
        $post = $this->createDummyBlogPost();

        //here we confirm that the newly created post is in the database
        $this->assertDatabaseHas('blog_posts', [
            'id' => $post->id,
            'title' => $post->title,
            'content' => $post->content
        ]);

        //here we create a new parameter to update the existing content
        $params = [
            'title' => 'A new updated title',
            'content' => 'Updated blog content'
        ];

        //we run test to confirm post is been updated and we get our session message
        $this->put("/post/{$post->id}", $params)
            ->assertStatus(302)
            ->assertSessionHas('message');

        //we confirm we get the success message that post updated successfully as defined
        $this->assertEquals(session('message'), 'Post Updated Successfully!');

        //we confirm the initial values has been changed and no longer in the database
        $this->assertDatabaseMissing('blog_posts', [
            'title' => 'New Blog Post',
            'content' => 'The content of the new blog post'
        ]);

        //we confirm that what we have in the database is the updated parameter
        $this->assertDatabaseHas('blog_posts', [
            'title' => 'A new updated title',
            'content' => 'Updated blog content'
        ]);
    }

    public function testDeleteBlogPostSuccessful()
    {
        $post = $this->createDummyBlogPost();

        //we run test to confirm post is been deleted and we get our session message
        $this->delete("/post/{$post->id}")
            ->assertStatus(302)
            ->assertSessionHas('message');

        //we confirm we get the success message that post updated successfully as defined
        $this->assertEquals(session('message'), 'Post deleted successfully');

        //we confirm the initial values has been deleted and no longer in the database
        $this->assertDatabaseMissing('blog_posts', [
            'title' => 'New Blog Post',
            'content' => 'The content of the new blog post'
        ]);
    }
}

