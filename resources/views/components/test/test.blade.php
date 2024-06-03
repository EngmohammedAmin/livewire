<body>
    <div style="direction: rtl">
        {{ $slot }}

        {{ $username }}<br>
       <div style="text-align: center"> USERS AND TASKS </div>
        @if (isset($users) && $users != '' && count($users) != 0)

            @php
                $i = 1;
            @endphp
            <br><br>
            <table id="Examble" class="table table-hover border table-responsive ">
                <thead style="width: 100%;text-align: center;background:rgb(46, 4, 4);color:white;">
                    <th> مسلسل </th>
                    <th> الاسم </th>
                    <th> الايميل</th>
                    <th> ID</th>
                    {{--  <th> Task title</th>  --}}
                    <th> CREATED AT </th>
                    {{--  <th> STATUS TITLE </th>  --}}
                </thead>
                <tbody style="text-align: center;">

                    @foreach ($users as $d)
                        <tr>
                            <td> {{ $i++ }}</td>
                            <td> {{ $d->name }}</td>
                            <td> {{ $d->email }}</td>
                            <td> {{ $d->id }}</td>
                            {{--  <td> {{ $d->title }}</td>  --}}
                            <td> {{ $d->created_at }}</td>
                            {{--  <td> {{ $d->status }}</td>  --}}
                        </tr>
                    @endforeach

                </tbody>

            </table>

            <div>

                {{--  {{ $posts->links() }}  --}}
            </div>
        @else
            <h3 style="text-align: center"> No users </h3>

        @endif
    </div>
</body>
