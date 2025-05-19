<div class="w-full my-5">
    <form action="{{ route("search") }}" method="POST" class="flex items-center gap-3 mx-3">
        @csrf
        <label for="search_listing" class="flex items-center gap-4 input input-bordered rounded-xl w-full">
            <img src="{{ asset("/icon.svg") }}" class="size-10">
            <input
            type="text"
            placeholder="Search for a listing or a tag or a company"
            name="search"
            class="w-full"
            value="{{ old('search') }}"
            >
        </label>
        <button class="btn btn-square btn-md rounded-xl" type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path fillRule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clipRule="evenodd" />
            </svg>
        </button>
    </form>
</div>
