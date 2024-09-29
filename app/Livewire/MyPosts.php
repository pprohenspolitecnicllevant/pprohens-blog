<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MyPosts extends Component
{
    public $posts = [];
    public $search = "";


    public function render()
    {
        if ($this->search != "") {
            $this->posts = Post::where('title', 'LIKE', "%{$this->search}%")
                        ->orWhere('url_clean', 'LIKE', "%{$this->search}%")
                        ->orWhere('content', 'LIKE', "%{$this->search}%")
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $this->posts = Post::orderBy("created_at" , "desc")->where('user_id', Auth::id())->get();
        }

        return view('livewire.my-posts');
    }
}
