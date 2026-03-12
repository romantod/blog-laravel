<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

$post = App\Models\Post::find(3);

echo "Post ID: " . $post->id . "\n";
echo "Post Title: " . $post->title . "\n";
echo "User ID: " . $post->user_id . "\n";
echo "User Object: " . ($post->user ? 'EXISTS' : 'NULL') . "\n";

if ($post->user) {
    echo "User Name: " . $post->user->name . "\n";
} else {
    echo "ERROR: User is NULL!\n";
}
