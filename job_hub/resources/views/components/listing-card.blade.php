 <div class="bg-[#F2F2F2] font-light text-start border rounded-xl p-2 flex justify-between items-center">
    <div>
        <a href="/{{ $listing->id }}"><h1 class="text-xl font-bold">{{ $listing->title }}</h1></a>
        <p>{{ $listing->description }}</p>
        <h4>{{ $listing->company }}</h4>
        <h6>{{ $listing->tags }}</h6>
    </div>
    <div>
        <img src="{{ $listing->photo ? asset("/storage/".$listing->photo) : asset("/icon.svg") }}" class="size-28" alt="">
    </div>
</div>
