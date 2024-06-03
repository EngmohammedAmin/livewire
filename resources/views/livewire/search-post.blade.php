<div>
    <input wire:model.live="search" type="text" placeholder="Search users..." />

    </ <ul>
    @foreach ($users as $user)
        <li>{{ $user->name }}</li>
    @endforeach
    </ul>
</div>
