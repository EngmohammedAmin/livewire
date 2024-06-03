<div dir="rtl">


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
    <button class="btn btn-sm btn-primary " wire:click="$dispatchTo('add-app-tasks', 'Get_Create_Form')">
        Creat Task
    </button>
    <br>
    @livewire('add-app-tasks')
    {{--  <livewire:add-app-tasks @addTask="refreshee">  --}}
    @livewire('update-task')
    {{--  <livewire:add-app-tasks lazy />  --}}
    @livewire('index-task', ['totalTasks' => "$totalTasks", 'Tasks' => $Tasks])
    {{--  <livewire:index-task :totalTasks="$totalTasks" />  --}}
    {{--  <h1 style="text-align: center"> My Tasks ({{ $totalTasks }})</h1>
    @if (isset($Tasks) && $Tasks != '' && count($Tasks) != 0)


        @php
            $i = 1;
        @endphp
        <br><br>
        <table id="Examble" class="table table-hover border table-responsive" style="table-layout: fixed">
            <thead style="width: 100%;text-align: center;background:rgb(46, 4, 4);color:white;">
                <th style="width: 10%"> مسلسل </th>
                <th style="width: 25%"> الاسم </th>
                <th style="width: 25%"> الحالة </th>
                <th> العمليات</th>

            </thead>
            <tbody style="text-align: center;">

                @foreach ($Tasks as $d)
                    <tr>
                        <td> {{ $i++ }}</td>
                        <td> {{ $d->title }}</td>
                        <td>
                            @if ($d->status == 1)
                                مفعل
                            @else
                                غير مفعل
                            @endif

                        </td>
                        <td style=""class="control">
                            <div style="">
                                <a href="#" id="" class="btn btn-sm btn-primary "
                                    style="margin-left: 5px">عرض
                                    التفاصيل</a>



                                <button class="btn btn-sm btn-success "
                                    wire:click="$dispatchTo('update-task', 'Get_Edit_Form', { id: {{ $d->id }} })">
                                    تعديل
                                </button>

                                <button class="btn btn-sm btn-danger " type="button"
                                    wire:click="Delete_Task({{ $d->id }})"
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

            {{ $Tasks->links() }}
        </div>
    @else
        <h3 style="text-align: center"> No Tasks </h3>

    @endif  --}}


    <a href="{{ route('welcome') }}" wire:navigate.hover class="btn btn-sm btn-dark "> رجوع
    </a>


</div>
