@extends ('main')


@section('content')


<table class="table"> 
    <thead>
        <th>Index</th>
        <th>Name</th>
        <th>email</th>
    </thead>

    <tbody>
        @foreach($drivers as $driver)
       <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$driver->name}}</td>
        <td>{{$driver->email}}</td>
       </tr>
        @endforeach
    </tbody>
</table>
{{$drivers->links()}}


@endsection