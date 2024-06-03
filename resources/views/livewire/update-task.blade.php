<div>
    @if (Session::has('success'))
        <div style="background: rgb(10, 150, 10);color:white;text-align:center">
            {{ Session::get('success') }}
        </div><br>
    @endif
    @if (Session::has('error'))
        <div style="background: red;color:white;text-align:center">
            {{ Session::get('error') }}
        </div><br>
    @endif
    @if (isset($edit) && $edit != '' && $edit != 0 && ($edit = 1))
        <div style="background:rgb(107, 189, 171);text-align:center;direction:ltr;overflow-x: auto; max-width: 100%;">
            <h2>Edit : {{ $title }}</h2><br>
            <form id="EDIT" name="EDIT" wire:submit.prevent="update">
                <div style="display: inline">
                    <label for="edit_title">Title:</label>
                    <input type="text" wire:model="title" id="edit_title">
                    @error('title')
                        <span style="background: red">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit">Save</button>
                <span wire:loading>Saving...</span>

            </form><br>
        </div><br><br>
    @endif
</div>
