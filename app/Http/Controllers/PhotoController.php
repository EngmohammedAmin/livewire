<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $users = User::get();
        $post = Post::find(77);
        $user = User::find(3);
        $task = Task::find(107);
        $post->name = 'Mohammed Amin';
        $post->save();
        $Tasks = $user->tasks;

        return $user->taskPost;
        // return $user->largesttask;
        // return $user->posts;
        // return $subjects = $user->tasks()->with('posts')->get()->pluck('posts')->flatten();
        $uusers = $users->makeHidden('name');
        // $uusers =$uusers->toJson();

        // return $uusers;
        // $Tasks = Task::whereIn('user_id', DB::table('users')->select('id')->where('email', 'm@m.com'))->get();
        $posts = Post::simplePaginate(5);
        $username = 'name';

        return view('photo.index', compact('users', 'Tasks', 'username', 'posts', 'uusers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return 'create';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return 'store';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return 'show'.$id;

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // return 'edit'.$id;
        return Post::where('id', $id)->first();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return 'update'.$id;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return 'destroy'.$id;
    }
}
