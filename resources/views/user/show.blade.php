@extends ('main')

@section('content')
    
    
<h2>User Name: {{ $user?->name }}</h2>
    <p>Email: {{ $user?->email }}</p>
    <p>National_num: {{$user?->national_id->national_number}}</p>

@endsection