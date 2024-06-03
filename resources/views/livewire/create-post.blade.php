<div>
    @if (Session::has('success'))
        <div class="alert alert-danger">
            {{ Session::get('success') }}
        </div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif
    <div style="direction: rtl">
        <form wire:submit.prevent="add">
            <input style="background: rgb(201, 238, 68);border: 2px solid #000000;margin-bottom:5px" type="text"
                wire:model="name" placeholder="name..."><br>
            <input style="background: rgb(201, 238, 68);border: 2px solid #000000;" type="text" wire:model="age"
                placeholder="age..."><br>
            <input style="background: rgb(201, 238, 68);border: 2px solid #000000;" type="text" wire:model="note"
                placeholder="note..."><br>

            <button id="submt" type="submit" style="background: rgb(16, 145, 16)">save </button><br>
        </form>
    </div>

</div>
