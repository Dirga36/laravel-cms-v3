<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="space-y-5">
                @foreach ($posts as $post)
                    <div
                        class="block p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <a href="#">
                            @if (Auth::check() && Auth::user()->id == $post->user_id)
                                <p class="italic text-gray-500">You - {{ $post->created_at->diffForHumans() }}</p>
                            @else
                                <p class="text-gray-500">{{ $post->user->name }} · {{ $post->created_at->diffForHumans() }}</p>
                            @endif

                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $post->title }}</h5>
                            <p class="font-normal text-gray-700 dark:text-gray-400">
                                {{ Str::limit($post->content, 150) }}</p>
                            @if ($post->thumbnail)
                                <div class="basis-1/4 p-0 content-center justify-center">
                                    <img src="{{ asset('thumbnails/' . $post->thumbnail . '.jpg') }}"
                                        alt="{{ $post->title }}"
                                        class="object-cover w-full h-fit border border-slate-700 dark:border-slate-300">
                                </div>
                            @endif
                            {{--
                            via storage:

                            @if ($post->image)
                            <div class="basis-1/4 p-0 content-center justify-center">
                                <img src="{{ asset('storage/' . $post->image) }}"
                                     alt="{{ $post->title }}"
                                    class="object-cover w-full h-fit border border-slate-700 dark:border-slate-300">
                            </div>
                            @endif 
                            --}}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
