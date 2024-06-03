<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Attributes\On;
use Livewire\Component;

class UpdateTask extends Component
{
    public $title = '';

    public $edit = 0;

    public $id;

    #[On('hide_Edit_Form')]
    public function Hide_Edit_Form()
    {
        $this->edit = 0;
    }

    #[On('Get_Edit_Form')]
    public function Get_Edit_Form($id)
    {
        $this->dispatch('hide_Create_Form')->to(AddAppTasks::class);
        $this->edit = 1;
        $this->id = $id;
        $task = Task::findOrFail($id);

        $this->title = $task->title;
    }

    public function update()
    {
        $validatedData = $this->validate([
            'title' => 'required',

        ]);

        $task = Task::findOrFail($this->id);
        // $this->authorize('update', $task);
        $n = $task->update([
            'title' => $this->title,

        ]);
        if ($n) {
            session()->flash('success', ' The Task {'.$this->title.'} updated successfully.');

            $this->edit = 0;
            $this->dispatch('updateTask');

        } else {
            session()->flash('error', 'Task Not updated .');

        }

    }

    public function render()
    {
        return view('livewire.update-task');
    }
}
