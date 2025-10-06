<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Post Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 space-y-6">

                    <!-- Back Button -->
                    <a href="{{ route('posts.index') }}" 
                       class="inline-block px-4 py-2 bg-gray-600 text-white rounded-lg shadow hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400">
                        ← Back to Posts
                    </a>

                    <!-- Post Title -->
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-2">
                            {{ $post->title }}
                        </h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Category: <span class="font-semibold">{{ $post->category->name ?? '—' }}</span>
                        </p>
                    </div>

                    <!-- Post Image -->
                    @if ($post->photo)
                        <div class="mt-4">
                            <img src="{{ asset('storage/' . $post->photo) }}" 
                                 alt="{{ $post->title }}" 
                                 class="rounded-lg shadow-md max-h-96 object-cover">
                        </div>
                    @endif

                    <!-- Post Content -->
                    <div class="prose dark:prose-invert max-w-none">
                        {!! nl2br(e($post->text)) !!}
                    </div>

                    <!-- Action Buttons -->
                    <div class="pt-6 flex justify-end space-x-3">
                        <a href="{{ route('posts.edit', $post) }}" 
                           class="inline-block px-4 py-2 bg-yellow-500 text-white rounded-lg shadow hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-300">
                            Edit
                        </a>

                    @if ($post->photo)                        
                        <form action="{{ route('posts.removePhoto', $post) }}" method="POST" 
                              onsubmit="return confirm('Are you sure you want to delete this post photo?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="px-4 py-2 bg-red-600 text-white rounded-lg shadow hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400">
                                Remove Photo
                            </button>
                        </form>    
                    @endif                        

                        <form action="{{ route('posts.destroy', $post) }}" method="POST" 
                              onsubmit="return confirm('Are you sure you want to delete this post?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="px-4 py-2 bg-red-600 text-white rounded-lg shadow hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400">
                                Delete
                            </button>
                        </form>                        
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
