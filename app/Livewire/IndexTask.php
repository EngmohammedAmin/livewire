<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class IndexTask extends Component
{
    use WithPagination;

    protected $listeners = ['updateTask' => '$refresh', 'DeleteTask' => '$refresh', 'addTask' => '$refresh'];
    // protected $listeners = ['addTask' => 'Emitting'];

    // public function Emitting()
    // {

    //     dd('new task add');
    // }

    public $totalTasks;

    public $Tasks;

    public $perPage;

    public function render()
    {
        return view('livewire.index-task');
    }
}