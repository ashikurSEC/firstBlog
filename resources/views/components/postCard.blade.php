@props(['post', 'full' => false])

<div class="card mb-2">

    {{-- ! Image --}}
    @if ( $post->image )
    <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}" class="w-full">
    @else
    <img src="{{ asset('storage/posts_images/default.jpg') }}" alt="{{ $post->title }}">        
    @endif
    
    {{-- ! Title  --}}
    <h2 class="font-bold text-xl">{{ $post->title }}</h2>

    {{-- ! Another And Date --}}
    <div class="text-xs font-mono text-slate-500 font-bold mb-4 mt-2">
        <span>Posted {{ $post->created_at->diffForHumans() }} By -</span>
        <a href="{{ route('posts.user', $post->user)}}" class="text-green-500 font-medium hover:underline">{{ $post->user->username }}</a>
    </div>

     {{-- ! Body --}}

     @if ( $full )

     <div class="text-sm mt-2">
        <span>{{ ($post->body) }}</span>
     </div>
         
     @else
     
     <div class="text-sm mt-2">
         <span>{{ Str::words($post->body, 10) }}</span>
         <a href="{{ route('posts.show', $post)}}" class="text-blue-500  hover:underline ml-2">Read More &rarr;</a>
     </div>

     @endif

     <div class="flex items-center justify-end gap-4 mt-6">
        {{ $slot }}
     </div>

</div>

