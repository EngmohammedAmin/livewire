<div style="direction: ltr">
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

   
    {{--  @if (isset($edit) && $edit != '' && $edit != 0 && ($edit = 1))  --}}
    <div style="background:rgb(107, 189, 171);text-align:center">
        <label style="">Edit Post:</label><br><br>
        <form id="EDIT" name="EDIT" wire:submit.prevent="update">
            <label>name:</label>
            <input type="text" wire:model="name" id="edit_name">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <label>age:</label>
            <input type="text" wire:model="age" id="edit_age">
            @error('age')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <label>Note:</label>
            <input type="text" wire:model="note" id="edit_note"><br><br><br>
            @error('note')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <button type="submit">Save</button>
        </form><br>
    </div><br><br>
    {{--  @else
    @endif  --}}
</div>
