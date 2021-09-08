<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class MyPost extends Component
{
    public $posts;

    public function mount()
    {
        $this->posts = Post::join('users', 'users.id', 'posts.user_id')
                        ->where('user_id', session('user_id'))->get();
    }

    public function render()
    {
        return view('livewire.my-post')
            ->extends('layouts.app')
            ->section('content');
    }
}
