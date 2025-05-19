<div class="text-center max-h-screen flex flex-col gap-4">
    <div class="bg-gray-50 p-3 w-full rounded-lg flex flex-col items-center">
        <img src="{{$listing->photo ? asset("/storage/".$listing->photo) :  asset("/icon.svg") }}" class="size-44">
        <h1 class="font-bold text-xl">{{ $listing->title }}</h1>
        <h3>{{ $listing->company }}</h3>
    </div>
    <div class="text-center flex flex-col items-center gap-5 -translate-x-1">
        <p class="text-lg">{{ $listing->description}}</p>
        <p class="font-bold text-blue-500">Email:{{ $listing->email }}</p>
        <div class="flex items-center gap-6 mr-[15%]">
            <button class="btn btn-square btn-primary w-full">Contact Company</button>
            <button class="btn btn-square btn-primary w-full"><a href="{{ $listing->website }}"></a>View Website</button>
        </div>
        <h5>{{ $listing->tags }}</h5>
        <h5 class="flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path fill-rule="evenodd" d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" />
            </svg>
            <span>{{ $listing->location }}</span>
        </h5>
        <form action="/delete/{{ $listing->id }}" method="post">
            @csrf
            @method("DELETE")
            <button type="submit">Delete Listing</button>
        </form>
        <a href="{{ route("index") }}" class="w-[50%] ml-6">
            <button class="btn btn-square btn-success w-[50%]">
                Go Back
            </button>
        </a>
    </div>
</div>
