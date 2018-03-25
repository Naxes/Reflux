<?php

use App\User;
use App\Post;
use App\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
    }
}

class UsersTableSeeder extends Seeder 
{
    public function run() 
    {
        DB::table('users')->delete();

        User::create(
        [
            'name'      => 'Naxes',
            'email'     => 'naxes@example.com',
            'password'  => Hash::make('tester')
        ]);

        User::create(
        [
            'name'      => 'Sean',
            'email'     => 'sean@example.com',
            'password'  => Hash::make('tester')
        ]);
    }
}

class PostsTableSeeder extends Seeder 
{
    public function run()
    {
        DB::table('posts')->delete();

        Post::create(
        [
            'title'     => 'HTML',
            'body'      => '<p>This is a post generated by <b>seeding</b> to populate the site.</p>
                            <pre class="language-markup"><code>Markup Post!</code></pre>',
            'score'     => 1250,  
            'user_id'   => 1
        ]);

        Post::create(
        [
            'title'     => 'CSS',
            'body'      => '<p>This is a post generated by <b>seeding</b> to populate the site.</p>
                            <pre class="language-markup"><code>CSS Post!</code></pre>',
            'score'     => 671,  
            'user_id'   => 2
        ]);

        Post::create(
        [
            'title'     => 'JavaScript',
            'body'      => '<p>This is a post generated by <b>seeding</b> to populate the site.</p>
                            <pre class="language-markup"><code>JavaScript Post!</code></pre>',
            'score'     => 1500,  
            'user_id'   => 1
        ]);

        Post::create(
        [
            'title'     => 'PHP',
            'body'      => '<p>This is a post generated by <b>seeding</b> to populate the site.</p>
                            <pre class="language-markup"><code>PHP Post!</code></pre>',
            'score'     => 2350,  
            'user_id'   => 2
        ]);

        Post::create(
        [
            'title'     => 'Java',
            'body'      => '<p>This is a post generated by <b>seeding</b> to populate the site.</p>
                            <pre class="language-markup"><code>Java Post!</code></pre>',
            'score'     => 436,  
            'user_id'   => 1
        ]);

        Post::create(
        [
            'title'     => 'Git',
            'body'      => '<p>This is a post generated by <b>seeding</b> to populate the site.</p>
                            <pre class="language-markup"><code>Git Post!</code></pre>',
            'score'     => 127,  
            'user_id'   => 2
        ]);

        Post::create(
        [
            'title'     => 'Ruby',
            'body'      => '<p>This is a post generated by <b>seeding</b> to populate the site.</p>
                            <pre class="language-markup"><code>Ruby Post!</code></pre>',
            'score'     => 127,  
            'user_id'   => 1
        ]);

        Post::create(
        [
            'title'     => 'Python',
            'body'      => '<p>This is a post generated by <b>seeding</b> to populate the site.</p>
                            <pre class="language-markup"><code>Python Post!</code></pre>',
            'score'     => 127,  
            'user_id'   => 2
        ]);

        Post::create(
        [
            'title'     => 'C#',
            'body'      => '<p>This is a post generated by <b>seeding</b> to populate the site.</p>
                            <pre class="language-markup"><code>C# Post!</code></pre>',
            'score'     => 127,  
            'user_id'   => 1
        ]);

        Post::create(
        [
            'title'     => 'Objective-C',
            'body'      => '<p>This is a post generated by <b>seeding</b> to populate the site.</p>
                            <pre class="language-markup"><code>Objective-C Post!</code></pre>',
            'score'     => 127,  
            'user_id'   => 2
        ]);

        Post::create(
        [
            'title'     => 'Perl',
            'body'      => '<p>This is a post generated by <b>seeding</b> to populate the site.</p>
                            <pre class="language-markup"><code>Perl Post!</code></pre>',
            'score'     => 127,  
            'user_id'   => 1
        ]);

        Post::create(
        [
            'title'     => 'HTTP',
            'body'      => '<p>This is a post generated by <b>seeding</b> to populate the site.</p>
                            <pre class="language-markup"><code>HTTP Post!</code></pre>',
            'score'     => 127,  
            'user_id'   => 2
        ]);
    }
}

class CommentsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('comments')->delete();

        Comment::create(
        [
            'user_id' => 1,
            'post_id' => 1,            
            'comment' => 'This is a parent comment.'
        ]);

        Comment::create(
        [
            'user_id'   => 2,
            'post_id'   => 1,
            'parent_id' => 1,           
            'comment'   => 'This is a child comment.'
        ]);

        Comment::create(
        [
            'user_id' => 1,
            'post_id' => 1,            
            'comment' => 'This is another parent comment.'
        ]);
    }
}


