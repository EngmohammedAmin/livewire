<?php

namespace App\Livewire;

use App\Models\Task;
use App\Models\User;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Lazy]
class AddAppTasks extends Component
{
    // public $title;

    public $tasks;

    public $create = 0;

    public $username = '';

    // #[Validate('required|min:5', message: 'Please provide a post title')]
    #[Rule('required|min:5', as: 'name of Task')]
    public $title = '';

    public $totalTasks;

    // public function emit($event, $data = [])
    // {
    //     $this->dispatch($event, $data);
    // }

    #[On('hide_Create_Form')]
    public function Hide_Create_Form()
    {
        $this->create = 0;
    }

    #[On('Get_Create_Form')]
    public function Get_Create_Form()
    {
        $this->create = ! $this->create;
        if ($this->create == 1) {
            $this->dispatch('hide_Edit_Form')->to(UpdateTask::class);

        }

    }

    public function CreateTask()
    {
        $this->validate();

        try {

            $user = User::find(2);

            $task = new Task();
            $n = $task->create([
                'title' => $this->title,
                'user_id' => $user->id,
            ]);
            if ($n) {
                session()->flash('success', ' The Task {'.$this->title.'} created successfully.');

                $this->dispatch('addTask');

                // $this->dispatch('add_Task')->to(AppTasks::class);

            }

            $this->title = '';

        } catch (\Exception $ex) {
            return back()->with(['error' => 'عفوا حدث خطأ ما '.$ex->getMessage()])->withInput();

        }
    }

    public function updated($title)
    {
        $this->validateOnly($title);

        //عمل هذه الدالة فقط مراقبة المتغير title وتعطي التصحيح مباشرة مجرد ادخال حرف

    }

    public function render()
    {
        return view('livewire.add-app-tasks');
    }
}