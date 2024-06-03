<?php

namespace App\Livewire;

use App\Models\Task;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class AppTasks extends Component
{
    use WithPagination;

    public $title = '';

    public $edit = 0;

    public $id;

    public $Tasks;

    public $totalTasks;

    public $perPage = 5;

    protected $paginationTheme = 'bootstrap';

    // protected $listeners = ['updateTask' => '$refresh', 'addTask' => '$refresh', 'DeleteTask' => '$refresh'];
    // protected $listeners = ['addTask' => 'Emitting'];

    // public function Emitting()
    // {

    //     dd('new task added');
    // }
    #[On('addTask')]
    public function refreshee()
    {
        // $this->dispatch('DeleteTask');
        dd('new task added');

    }

    public function mount()
    {
        $this->Tasks = Task::get();
        // $this->Tasks = Task::all();
        // $this->Tasks = Task::paginate($this->perPage);

        $user = User::find(2);
        $this->totalTasks = $user->tasks()->count();

        // $this->Tasks = $user->tasks()->latest()->paginate(5);

    }

    public function test()
    {
        $this->title = '$title';

    }

    public function Delete_Task($id)
    {
        $delet_task = Task::find($id);
        $t = $delet_task->title;
        $d = $delet_task->delete();
        $this->edit = 0;
        if ($d) {
            session()->flash('success', ' The Task {'.$t.'} Deleted successfully.');

            $this->edit = 0;
            $this->dispatch('DeleteTask');

        } else {
            session()->flash('error', 'Task Not Deleted .');

        }
    }

    public function render()
    {
        $user = User::find(2);
        $this->totalTasks = $user->tasks()->count();
        $Tasks = $user->tasks()->latest()->paginate(5);

        // return view('livewire.app-tasks', ['totalTasks' => $totalTasks,
        //     'Tasks' => $Tasks,
        // ]);
        return view('livewire.app-tasks', ['Tasks' => $this->Tasks, 'totalTasks' => $this->totalTasks]);
    }
}