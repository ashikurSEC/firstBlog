<x-layout>
    <h1 class="title">Welcome {{ auth()->user()->username }}, you have {{ $posts->total() }} posts</h1>

    {{-- ! Create Form --}}

    <div class="card mb-4">
        <h2 class="font-bold mb-4">Create a new post</h2>

        {{-- ! Session Messages --}}
        @if (session('success'))
            <x-flashMsg msg="{{ session('success') }}" />
        @elseif (session('delete'))
            <x-flashMsg msg="{{ session('delete') }}" bg="bg-red-500" />
        @endif


        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- ! Post Title --}}

            <div class="mb-4">
                <label for="title">Post Title</label>
                <input type="text" name="title" id="title" placeholder="Post Title"
                    class="bg-slate-100 border-2 w-full p-4 rounded-lg @error('title') border-red-500 @enderror"
                    value="{{ old('title') }}">

                @error('title')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- ! Post Body --}}

            <div class="mb-4">

                <label for="body">Post Conent</label>
                <textarea name="body" rows="5"
                    class="bg-slate-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror">{{ old('body') }}
                </textarea>

                @error('body')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>


            {{-- ! Post Image --}}

            <div class="mb-4">
                <label for="image">Cover Photos</label>
                <input type="file" name="image" id="image"
                    class="bg-slate-100 border-2 w-full p-4 rounded-lg @error('image') border-red-500 @enderror">
                @error('image')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>


            {{-- ! Submit Button --}}
            <button type="submit" class="btn">Create</button>

        </form>

    </div>

    {{-- ! User Post --}}
    <h3 class="font-bold md-4 py-2">Your Latest Post</h3>


    <div class="grid grid-cols-2 gap-6">

        @foreach ($posts as $post)
            <x-postCard :post="$post">
                {{-- ! Edit Post --}}
                <a href="{{ route('posts.edit', $post) }}" class="bg-green-500 text-white hover:bg-green-600 py-1 px-3 text-sm rounded-md">Update</a>

                {{-- ! Delete Post  --}}
                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                    @csrf

                    @method('DELETE')
                    <button type="submit"
                        class="bg-red-500 text-white hover:bg-red-600 py-1 px-2 text-sm rounded-md">Delete</button>
                </form>
            </x-postCard>
        @endforeach
    </div>

    <div>
        {{ $posts->links() }}
    </div>

</x-layout>
