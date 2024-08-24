<x-layout>

    <a href="{{ route('dashboard') }}" class="block mb-2 text-md text-green-500">&larr; Go back to your dashboard</a>

    <div class="card">
        <h1 class="title">Update Your Post</h1>
        <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
    
            {{-- ! Post Title --}}
    
            <div class="mb-4">
                <label for="title">Post Title</label>
                <input type="text" name="title" value="{{ old('title', $post->title) }}" id="title" placeholder="Post Title"
                    class="bg-slate-100 border-2 w-full p-4 rounded-lg @error('title') border-red-500 @enderror">
    
                @error('title')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
    
            {{-- ! Post Body --}}
    
            <div class="mb-4">
                <label for="body">Post Content</label>
                <textarea name="body" rows="5"
                    class="bg-slate-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror">
                    {{ old('body', $post->body) }}
                </textarea>
    
                @error('body')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{--! Current Cover photo if exists --}}

            @if ($post->image)
            <div class="mb-4 h-64 rounded-md w-1/4 object-cover overflow-hidden">
                <label for="image">Current Picture</label>
                <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}" class="w-full">
            </div>
            
            @endif

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
            <button type="submit" class="btn">Update</button>
    
        </form>
    </div>

</x-layout>
