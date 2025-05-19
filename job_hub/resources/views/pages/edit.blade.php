@extends("layout")

@section("content")
    @if(session()->has("message"))
        <x-alert-component :message="session('message')" type="success" />
    @endif
    <div class="w-screen h-[500px] flex justify-center items-center">
        <x-edit-component :listing="$listing" />
    </div>
    @include("partials._footer")
@endsection
