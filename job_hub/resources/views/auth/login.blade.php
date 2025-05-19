@extends("layout")

@section("content")
    <div class="w-screen h-[500px] flex justify-center items-center">
        <x-login-component />
    </div>
    @include("partials._footer")
@endsection
