<div>
    <br>
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
    @if (isset($create) && $create != '' && $create != 0 && ($create = 1))
        <div class="text-center" style="background:darkkhaki;text-align:center;direction: ltr">
            <h2>Create Task</h2><br>
            <form id="Create_Tasks" name="Create_Tasks" wire:submit.prevent="CreateTask">
                <div style="display: inline">

                    <input wire:model.live="title" type="text" id="title" placeholder="taske title...">
                    @error('title')
                        <span style="background: red">{{ $message }}</span><br><br>
                    @enderror
                </div>
                <button type="submit">Save</button><br>
                <span wire:loading>Saving...</span>
            </form><br>
            {{--  <button @click="$dispatch('addTask',{ title: 'New post added.' })">dispatch</button>  --}}
            {{--  <button wire:click="$parent.test()">Create Post</button>  --}}
        </div><br>
    @endif


</div>
