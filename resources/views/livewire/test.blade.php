<!-- my-livewire-component.blade.php -->

<div>



    <div class="text-center" style="background:darkkhaki;text-align:center">

        <label>getpost:</label>
        <button wire:click="getpost">getpost </button>
        <label>resetposts:</label>
        <button wire:click="resetpost">resetposts </button>
        <label>EditPost:</label>
        <button wire:click="editpost">EditPost </button><br>
    </div>
    <br>

    <form wire:submit="saveImage">
        <input type="file" wire:model="photo" livewire-upload-finish>

        @error('photo')
            <span class="error">{{ $message }}</span>
        @enderror

        <button type="submit">Save photo</button>
    </form>
    @if ($photo)
        <img src="{{ $photo->temporaryUrl() }}">
    @endif

    <div wire:offline class="text-center" style="background:darkkhaki;text-align:center">
        <label>Create Post:</label><br><br>
        <form id="Create" name="Create" wire:submit.prevent="save">
            <label>name:</label>
            <input type="text" wire:model.live="name" id="name">

            <label>age:</label>
            <input type="text" wire:model.live="age" id="age">

            <button type="submit">Save</button><br>
        </form><br>
        <p>لقد أدخلت الاسم: {{ $name }}</p> && <p>لقد أدخلت العمر: {{ $age }}</p>

    </div><br><br>
    @if (Session::has('success'))
        <div style="background: rgb(10, 150, 10);color:white;text-align:center">
            {{ Session::get('success') }}
        </div>
    @endif
    @if (Session::has('error'))
        <div style="background: red;color:white;text-align:center">
            {{ Session::get('error') }}
        </div>
    @endif


    @if (isset($GETS) && $GETS != '')
        @livewire('posts')
        {{--  <livewire:posts :$GETS />  --}}
    @endif

    <input wire:offline wire:model.live="username" type="text" placeholder="username ..." />
    {{ $username }}
    @if (isset($edit) && $edit != '' && $edit != 0 && ($edit = 1))
        <div class="text-center" style="background:rgb(107, 189, 171);text-align:center">
            <label style="">Edit Post:</label><br><br>
            <form id="EDIT" name="EDIT" wire:submit.prevent="save">
                <label>name:</label>
                <input type="text" wire:model="name" id="edit_name">

                <label>age:</label>
                <input type="text" wire:model="age" id="edit_age">

                <button type="submit">Save</button>
                <div wire:dirty>The data is in-sync...</div>
            </form><br>
        </div><br><br>
    @else
    @endif

    @hasSection('navigation')
    <div class="pull-right">
        @yield('navigation')
    </div>

    <div class="clearfix"></div>
@endif
    <div x-data="{ todo: '' }" wire:offlin>
        <input type="text" x-model="todo">
        <button wire:click="$set('showComments', true)">Show comments</button>
        <button x-on:click="$wire.addTodo(todo)">Add Todo</button>
        @if ($showComments)
            {{ $route }}
            <div>

                @foreach ($todos as $todo)
                    {{ $todo }}<br>
                @endforeach

        @endif
    </div>
    <hr>
    <input type="text" wire:model.lazy="testname" id="tst" name="tst">

    {{ $testname }}
    <a href="{{ route('welcome') }}" wire:navigate.hover class="btn btn-sm btn-dark " style="margin-left: 5px"> رجوع
    </a>

    <div>
        <!-- Modal -->
        <div x-data="{ open: false }">
            <button @click="open = ! open">Toggle Modal</button>
            @teleport('body')
                <div x-show="open">
                    Modal contents...
                </div>
            @endteleport

        </div>
    </div>
    <div>
        <form wire:submit="search">
            <input type="text" wire:model.live="query">

            <button wire:offline.attr="disabled" type="submit">Search posts</button>
        </form>
        <div>
            @foreach ($posts as $post)
                {{ $post->name }}<br>
            @endforeach
        </div>

        {{ $posts->links(data: ['scrollTo' => false]) }}
    </div>
</div>
