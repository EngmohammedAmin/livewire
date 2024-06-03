<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{
    use WithPagination;

    protected $listeners = ['addPost' => '$refresh'];

    // protected $listeners = ['transitionend' => 'Get_Create_Form'];

    #[Rule('required|min:5')]
    public $search = '';

    public $postCount;

    protected $paginationTheme = 'bootstrap';

    public $posts = '';

    public $getposts;

    public $name;

    // #[Locked]
    public $id;

    public $age;

    public $perPage = 1;

    public $postId = 53;

    public $note;

    public $edit = 0;

    public $creat = 0;

    public $success;

    public $username = '';

    public $error;

    #[On('post-created')]
    public function updatePostList($title)
    {
        // ...
    }

    public function Get_Create_Form()
    {
        $this->edit = 0;
        $this->creat = 1;
        $this->name = '';
        $this->age = '';
        $this->note = '';
    }

    public function add_post()
    {
        $this->edit = 0;
        $this->creat = 1;
        $validatedData = $this->validate([
            'name' => 'required',
            'age' => 'required',

        ]);
        try {

            $post = new Post();
            $n = $post->create([
                'name' => $this->name,
                'age' => $this->age,
                'note' => $this->note,

            ]);
            if ($n) {
                session()->flash('success', ' The Post created successfully.');
                // $this->posts = Post::get();
                // $this->js("alert('Post saved!')");
                // $this->dispatch('addPost');
            }

            $this->name = '';
            $this->age = '';
            $this->note = '';
        } catch (\Exception $ex) {
            return back()->with(['error' => 'عفوا حدث خطأ ما '.$ex->getMessage()])->withInput();

        }

    }

    public function Get_Edit_Form($id)
    {
        $this->edit = 1;
        $this->creat = 0;
        $this->id = $id;
        $post = Post::findOrFail($id);

        $this->name = $post->name;
        $this->age = $post->age;
        $this->note = $post->note;
        // $this->reset('posts');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'age' => 'required',

        ]);

        $post = Post::findOrFail($this->id);
        // $this->authorize('update', $post);
        $n = $post->update([
            'name' => $this->name,
            'age' => $this->age,
            'note' => $this->note,

        ]);
        if ($n) {
            session()->flash('success', 'Post updated successfully.');
            $this->posts = Post::get();
        } else {
            session()->flash('error', 'Post updated successfully.');

        }

    }

    public function getpost()
    {
        // $this->posts = Post::latest()->paginate(5);
        // $paginatedPosts = Post::paginate(5);
        // $this->posts[] = $paginatedPosts;
        $this->posts = Post::get();
        // $this->GETS = Post::get();

    }

    public function editpost($postId)
    {
        $this->posts = Post::get();

    }

    public function resetpost()
    {
        $this->reset('posts');

    }

    public function Delete_Post($id)
    {
        try {

            $this->edit = 0;
            $this->creat = 0;
            $this->id = $id;
            $post = Post::findOrFail($id);
            $Post_name = $post->name;
            $n = $post->delete();

            if ($n) {
                session()->flash('success', ' The Post {'.($Post_name).'} DELETED successfully.');
                $this->posts = Post::get();
            }

        } catch (\Exception $ex) {
            return back()->with(['error' => 'عفوا حدث خطأ ما '.$ex->getMessage()])->withInput();

        }

    }

    public function updated($search)
    {
        // $this->search = $search;
        $this->validateOnly($search);

        //عمل هذه الدالة فقط مراقبة المتغير title وتعطي التصحيح مباشرة مجرد ادخال حرف

    }

   

    public function render()
    {

        return view('livewire.posts', [
            'GETS' => Post::where('name', 'like', '%'.$this->search.'%')->get(),
        ]);
        // return view('livewire.posts');

    }
}