@extends("template")
@section('title', 'Welcome')
@section('content')
    @foreach ($listing as $list)

            <a href="/find/{{$list['id']}}">
                {{ $list['name'] }}
            </a>

    @endforeach
@endsection



