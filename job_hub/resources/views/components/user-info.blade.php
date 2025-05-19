<div class="w-full h-[100px] bg-gray-200 flex justify-center items-center gap-10 p-14">
    <div class="">
        <i class="">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-24">
            <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
            </svg>
        </i>
    </div>
    <div class="flex flex-col gap-3">
        <h2>{{ $user->username }}</h2>
        <h4>{{ $user->email }}</h4>
        <p>Member since {{ str_split($user->created_at, 10)[0] }}</p>
    </div>
</div>
