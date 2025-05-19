@extends("layout")

@section("content")
    <div class="w-screen h-[500px] flex justify-center items-center">
        <x-sign-up-component />
    </div>
    @include("partials._footer")
@endsection
