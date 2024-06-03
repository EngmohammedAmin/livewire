<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route as FacadesRoute;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Test extends Component
{
    use WithPagination;

    public $name;

    public $age;

    public $todos;

    public $testname;

    public $GETS;

    public $route;

    public $username = '';

    public $showComments = false;

    public $edit = 0;

    // #[Url]
    public $query = '';
    // public $posts;

    #[Rule('image|max:1024')] // 1MB Max
    public $photo;

    public function saveImage()
    {
        $this->photo->store('photos');
    }

    public function addTodo($todo)
    {
        $this->todos[] = $todo;
        
    }

    public function save()
    {
        try {
            Post::create([
                'name' => $this->name,
                'age' => $this->age,
            ]);
            $this->name = '';
            $this->age = '';
            Session::flash('success', 'The post has been successfully created & stored.');

        } catch (\Throwable $th) {
            Session::flash('error', 'The post has not been created & stored.');

        }

    }

    public function getpost()
    {
        $this->GETS = Post::get();

    }

    public function resetpost()
    {
        // $this->posts = '';
        $this->GETS = '';
    }

    public function editpost()
    {
        $this->edit = ! $this->edit;

    }

    public function updated($property)
    {
        // $property: The name of the current property that was updated

        if ($property === 'username') {
            $this->username = strtolower($this->username);
        }
    }

    use WithFileUploads;

    public function search()
    {
        $this->resetPage();
    }

    public function render()
    {

        return view('livewire.test', ['posts' => Post::search($this->query)]);

        // return view('livewire.test', ['posts' => Post::where('name', 'like', '%'.$this->query.'%')->cursorPaginate(3)]);
    }
}