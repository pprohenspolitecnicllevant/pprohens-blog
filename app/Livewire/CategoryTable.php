<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryTable extends Component
{
    public $categories = [];
    public $search = "";


    public function render()
    {
        if ($this->search != "") {
            $this->categories = Category::where('title', 'LIKE', "%{$this->search}%")
                ->orWhere('url_clean', 'LIKE', "%{$this->search}%")
                ->get();
        } else {
            $this->categories = Category::all();
        }

        return view('livewire.category-table');
    }
}
