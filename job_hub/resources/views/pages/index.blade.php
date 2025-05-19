@extends("layout")

@section("content")
    <main class="h-full">
        @include("partials._hero")
        <x-search-input />
        @if(isset($listings) && $listings->isNotEmpty())
            <div class="grid grid-cols-2 gap-5 mx-3 mt-5">
                @foreach ($listings as $listing)
                    <x-listing-card :listing="$listing" />
                @endforeach
            </div>
            <div class="mt-5 flex justify-center items-center gap-10 w-full">
                {{ $listings->links() }}
                <button class="btn btn-square btn-primary w-32 rounded-xl">
                    <a href="{{ route("create") }}">Add Listing</a>
                </button>
            </div>
        @endif
    </main>
@endsection
