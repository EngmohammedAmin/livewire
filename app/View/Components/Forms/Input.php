<?php

namespace App\View\Components\Forms;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $users = User::find(2);
        $name = $users->name;

        return view('components.forms.input', compact('name'));
    }
}