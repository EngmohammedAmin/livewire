<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts = Post::paginate(5);
        // $posts = User::paginate(5);
        $user = Auth::user();
        $posts = $user->posts()->paginate(5);

        return response()->json($posts);
        // $data = [
        //     'posts' => $posts->items(), // Retrieve the paginated items
        //     'current_page' => $posts->currentPage(),
        //     'last_page' => $posts->lastPage(),
        //     'per_page' => $posts->perPage(),
        //     'total' => $posts->total(),
        // ];
        // return $posts;

        // return response()->json([
        //     'data' => $posts,
        // ]);

        // $users = User::get();
        // $post = Post::find(77);
        // $user = User::find(3);
        // $task = Task::find(107);
        // $post->name = 'Mohammed Amin';
        // $post->save();
        // $Tasks = $user->tasks;

        // return 'posts';
        // return response()->json($task); // $task;
        // return $user->taskPost;
        // // return $user->largesttask;
        // return $user->posts;
        // return $subjects = $user->tasks()->with('posts')->get()->pluck('posts')->flatten();
        // $uusers = $users->makeHidden('name');
        // $uusers =$uusers->toJson();

        // return $uusers;
        // $Tasks = Task::whereIn('user_id', DB::table('users')->select('id')->where('email', 'm@m.com'))->get();
        // $posts = Post::simplePaginate(5);
        // $username = 'name';

        // return view('photo.index', compact('users', 'Tasks', 'username', 'posts', 'uusers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // store posts for auth user
        // return $request;
        try {

            $user = Auth::user();
            $validatedData = $request->validate([
                'name' => 'required',
                'age' => 'required',
            ]);

            if (! $validatedData) {

                return response()->json($validatedData);
            } else {
                $post = $user->posts()->create([
                    'name' => $request->name,
                    'age' => $request->age,
                    'note' => $request->note,
                ]);

                return response()->json($post, 200);
            }

        } catch (\Throwable $th) {
            throw $th;

            return response()->json($th);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
//
