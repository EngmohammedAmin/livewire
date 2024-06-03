<div style="direction:rtl;overflow-x: auto; max-width: 100%;"><br>
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

    <div style="text-align: center;overflow-x: fixed;"><br>
        <button class="btn btn-sm btn-success " wire:click="getpost"> Get Posts </button>
        <button class="btn btn-sm btn-primary " wire:click="Get_Create_Form"> Creat Posts </button>
        </button>
        <button class="btn btn-sm btn-dark " wire:click="resetpost"> Hide Posts
        </button>
    </div>



    @if (isset($creat) && $creat != '' && $creat != 0 && ($creat = 1))
        <div class="text-center" style="background:darkkhaki;text-align:center;direction: ltr">
            <h2>Create Post</h2><br>
            <form id="Create" name="Create" wire:submit.prevent="add_post">
                <div style="display: inline">
                    <label for="creat_name">name:</label>
                    <input type="text" wire:model="name" id="creat_name" placeholder="name...">
                    @error('name')
                        <span style="background: red">{{ $message }}</span>
                    @enderror
                </div>
                <div style="display: inline">
                    <label for="creat_age">age:</label>
                    <input type="text" wire:model="age" id="creat_age" placeholder="age...">
                    @error('age')
                        <span style="background: red">{{ $message }}</span><br><br>
                    @enderror
                </div>
                <div style="display: inline">
                    <label for="creat_note">Note:</label>
                    <input type="text" wire:model="note" id="creat_note" placeholder="note...">
                    @error('note')
                        <span style="background: red">{{ $message }}</span>
                    @enderror
                    <br><br>
                </div>
                <button type="submit">Save</button><br>
                <span wire:loading>Saving...</span>



            </form><br>

        </div><br>
    @else
    @endif
    @if (isset($edit) && $edit != '' && $edit != 0 && ($edit = 1))
        <div style="background:rgb(107, 189, 171);text-align:center;direction:ltr;overflow-x: auto; max-width: 100%;">
            <h2>Edit Post:</h2><br>
            <form id="EDIT" name="EDIT" wire:submit.prevent="update">
                <div style="display: inline">
                    <label for="edit_name">name:</label>
                    <input type="text" wire:model="name" id="edit_name">
                    @error('name')
                        <span style="background: red">{{ $message }}</span>
                    @enderror
                </div>

                <div style="display: inline">
                    <label for="edit_age">age:</label>
                    <input type="text" wire:model="age" id="edit_age">
                    @error('age')
                        <span style="background: red">{{ $message }}</span><br><br>
                    @enderror
                </div>

                <div style="display: inline">
                    <label for="edit_note">Note:</label>
                    <input type="text" wire:model="note" id="edit_note">
                    @error('note')
                        <span style="background: red">{{ $message }}</span>
                    @enderror
                    <br><br><br>
                </div>
                <button type="submit">Save</button>
                <span wire:loading>Saving...</span>

            </form><br>
        </div><br><br>
    @else
    @endif

    <br>
    <div>
        <button wire:click="$parent.resetpost()">Remove</button>
    </div>
    <br>

    {{--  @livewire('search-post', ['users' => $GETS])  --}}
    {{--  @include('livewire.search-post', ['users' => $GETS])  --}}

    {{--  <div>
        @foreach ($GETS as $post)
            @include('includes.test', $post):
        @endforeach
    </div>  --}}

    <br>
    <input wire:model.live="search" type="text" placeholder="Search posts..." />
    <button x-on:click="$wire.set('search', '', true)">Clear</button>
    <h2 x-text="$wire.search.length"></h2>
    {{ $search }}
    @if (isset($GETS) && $GETS != '' && count($GETS) != 0)

        @php
            $i = 1;
        @endphp
        <br><br>
        <table id="Examble" class="table table-hover border table-responsive ">
            <thead style="width: 100%;text-align: center;background:rgb(46, 4, 4);color:white;">
                <th> مسلسل </th>
                <th> الاسم </th>
                <th> العمر</th>
                <th> ملاحظات</th>
                <th> العمليات</th>
            </thead>
            <tbody style="text-align: center;">

                @foreach ($GETS as $d)
                    <tr>
                        <td> {{ $i++ }}</td>
                        <td> {{ $d->name }}</td>
                        <td> {{ $d->age }}</td>
                        <td> {{ $d->note }}</td>

                        <td style=""class="control">
                            <div style="">
                                <a href="#" id="" class="btn btn-sm btn-primary "
                                    style="margin-left: 5px">عرض
                                    التفاصيل</a>

                                <button class="btn btn-sm btn-success " wire:click="Get_Edit_Form({{ $d->id }})"
                                    style="margin-left: 5px"> تعديل
                                </button>

                                <button class="btn btn-sm btn-danger " type="button"
                                    wire:click="Delete_Post({{ $d->id }})"
                                    wire:confirm.prompt="Are you sure?\n\nType DELETE to confirm|DELETE">
                                    حذف
                                </button>

                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>

        <div>

            {{--  {{ $posts->links() }}  --}}
        </div>
    @else
        <h3 style="text-align: center"> No Posts : please click {Get Posts} button to get them</h3>

    @endif
    <a href="{{ route('welcome') }}" wire:navigate.hover class="btn btn-sm btn-dark " style="margin-left: 5px"> رجوع
    </a>
</div>

{{--  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).on('click', "#are_you_sure", function() {

        alert('Are you sure to delete');
    });
</script>  --}}
