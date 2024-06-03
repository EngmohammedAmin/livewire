<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class UpdatePost extends Component
{
    public $id;

    public $postId;

    public $name;

    public $age;

    public $note;

    public function mount($postId)
    {
        $this->postId = $postId;
        $post = Post::findOrFail($postId);
        $this->name = $post->name;
        $this->age = $post->age;
        $this->note = $post->note;
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'age' => 'required',
            'note' => 'required',
        ]);

        $post = Post::findOrFail($this->postId);
        $n = $post->update($validatedData);
        if ($n) {
            session()->flash('success', 'Post updated successfully.');

        }else{
            session()->flash('error', 'Post updated successfully.');

        }

    }

    public function render()
    {
        return view('livewire.update-post');
    }
}
