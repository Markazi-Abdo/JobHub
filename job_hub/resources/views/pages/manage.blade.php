@extends("layout")

@section("content")
    <main>
        <x-user-info :user="Auth::user()" />
        <x-user-listing-search />
        @if (isset($listings) && $listings->isNotEmpty())
            <div class="grid grid-cols-2 gap-4 mt-4 mx-3">
                @foreach ($listings as $listing)
                    <x-user-listing-card :listing="$listing"/>
                @endforeach
            </div>
            <div>
                {{ $listings->links() }}
            </div>
        @else
            <div class="flex justify-center items-center h-64">
                <button class="btn btn-primary btn-lg w-32 rounded-xl">
                    <a href="{{ route("manage") }}">Go Back</a>
                </button>
            </div>
        @endif

    </main>
    @include("partials._footer")
@endsection
