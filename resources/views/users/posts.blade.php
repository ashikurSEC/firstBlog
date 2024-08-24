<x-layout>
    <h1 class="title">{{ $user->username }}'s Posts &#9830 {{ $user->posts->count() }}</h1>

    {{--! User Post's --}}
    <div class="grid grid-cols-2 gap-6">

        @foreach ($posts as $post)
            <x-postCard :post="$post" />
        @endforeach
    </div>

    <div>
        {{ $posts->links() }}
    </div>

</x-layout>