@extends("layout")
@section("content")
    @include("partials._hero")
    <x-search-input />
    @if (isset($listings) && $listings->isNotEmpty())
        <div class="grid grid-cols-2 gap-5 mx-3 mt-5">
            @foreach ($listings as $listing)
                <x-listing-card :listing="$listing" />
            @endforeach
        </div>
        <div class="mx-[30%] mt-10">
            {{ $listings->links() }}
        </div>

    @else
        <div class="text-center mt-32">
            <h2 class="font-bold text-xl">No listings were found with your search</h2>
        </div>
        
    @endif
    <a href="/" class="w-full ml-[36%]">
        <button class="w-1/4 btn btn-square btn-primary mt-10">Go Back</button>
    </a>
@endsection
