 <div class="bg-[#F2F2F2] font-light text-start border rounded-xl p-2 flex justify-between items-center">
    <div>
        <a href="/{{ $listing->id }}"><h1 class="text-xl font-bold">{{ $listing->title }}</h1></a>
        <p>{{ $listing->description }}</p>
        <h4>{{ $listing->company }}</h4>
        <h6>{{ $listing->tags }}</h6>
        <time datetime="">Posted {{ str_split($listing->created_at, 10)[0] }}</time>
        <div class="flex items-center gap-2 mt-2">
            <button class="btn btn-square btn-sm w-28 btn-primary rounded-xl">
                <a href="{{ route("edit", $listing->id) }}">Edit Listing</a>
            </button>
            <form action="/delete/{{ $listing->id }}" method="post">
                @csrf
                @method("DELETE")
                <button class="btn btn-square btn-sm w-28 btn-error rounded-xl" type="submit">
                    Delete listing
                </button>
            </form>
        </div>
    </div>
    <div>
        <img src="{{ $listing->photo ? asset("/storage/".$listing->photo) : asset("/icon.svg") }}" class="size-28" alt="">
    </div>
</div>
