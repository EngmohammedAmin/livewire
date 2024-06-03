<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CreatePost extends Component
{
    public $name;

    public $age;

    public $note;

    public $success;

    public function create()
    {
        return view('Postss.create');
    }

    public function add()
    {
        $ma = $this->name;
        $ag = $this->age;
        $note = $this->note;
        if ($ma && $ag) {
            $d = Post::create([
                'name' => $ma,
                'age' => $ag,
                'note' => $note,
            ]);
            if ($d) {
                Session::flash('success', 'The post has been successfully stored.');
                $this->dispatch('addPost');
            } else {
                Session::flash('error', 'The post has not been  stored.');
            }
        }

        // $this->name = '';
        // $this->age = '';

    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
