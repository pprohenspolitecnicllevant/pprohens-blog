<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PublicPosts extends Component
{
    public $posts = [];
    public $search = "";


    public function render()
    {
        if ($this->search != "") {
            $this->posts = Post::where('posted', 'yes')
            ->where(function($query) {
                $query->where('title', 'LIKE', "%{$this->search}%")
                    ->orWhere('url_clean', 'LIKE', "%{$this->search}%")
                    ->orWhere('content', 'LIKE', "%{$this->search}%");
            })
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $this->posts = Post::orderBy("created_at" , "desc")->where('posted', 'yes')->get();
        }

        return view('livewire.public-posts');
    }
}
