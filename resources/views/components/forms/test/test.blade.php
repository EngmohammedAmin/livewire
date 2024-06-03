<body>
    <div>

        {{--  {{ $slot }}  --}}
        <div style="text-align: center">POSTS </div>
        @if (isset($posts) && $posts != '' && count($posts) != 0)

            @php
                $i = 1;
            @endphp
            <br><br>
            <table id="Examble" class="table table-hover border table-responsive ">
                <thead style="width: 100%;text-align: center;background:rgb(46, 4, 4);color:white;">
                    <th> مسلسل </th>
                    <th> الاسم </th>
                    <th> العمر</th>
                    <th> Created At</th>
                    <th> Upated At </th>
                    <th> post ID </th>
                </thead>
                <tbody style="text-align: center;">

                    @foreach ($posts as $d)
                        <tr>
                            <td> {{ $i++ }}</td>
                            <td> {{ $d->name }}</td>
                            <td> {{ $d->age }}</td>
                            <td> {{ $d->created_at }}</td>
                            <td> {{ $d->updated_at }}</td>
                            <th> {{ $d->id }} </th>

                        </tr>
                    @endforeach

                </tbody>

            </table>

            <div>

                {{ $posts->links() }}
            </div>
        @else
            <h3 style="text-align: center"> No Posts </h3>

        @endif
    </div>
</body>
