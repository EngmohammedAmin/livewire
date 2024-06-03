<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class SearchPost extends Component
{
    public $search = '';

    public $GETS;

    public $users;

    public function render()
    {

        return view('livewire.search-post');

        // return view('livewire.search-post', [
        //     'users' => Post::where('name', 'like', '%'.$this->search.'%')->get(),
        // ]);
    }
}