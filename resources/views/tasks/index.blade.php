<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">

    <!-- Styles -->

    @livewireStyles
</head>

<body class="antialiased">
    <div class="text-center">
        {{--  @livewire('app-tasks')  --}}
        <h1 style="text-align: center"> My Tasks ({{ $totalTasks }})</h1>
        {{--  {{ $route }}  --}}
        {{ request()->route()->getName() }}<br>
        {{ request()->url() }}
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

                                    {{--  <button class="btn btn-sm btn-danger " type="button"
                                        wire:click="Delete_Task({{ $d->id }})"
                                        wire:confirm.prompt="Are you sure?\n\nType DELETE to confirm|DELETE">
                                        حذف
                                    </button>  --}}

                                    <button class="btn btn-sm btn-danger " type="button"
                                        wire:click="$parent.Delete_Task({{ $d->id }})"
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

        @endif
    </div>

    @livewireScripts
    {{--  <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>  --}}

</body>

</html>
