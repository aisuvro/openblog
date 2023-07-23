@extends('welcome')
@section('content')
    <x-HeadingSection />
    @forelse ($blogs as $blog)
        <div class="w-full lg:w-3/5  sm:w-ful mx-auto">
            <div class="mx-5 my-3 text-sm">
                <a href=""
                    class=" text-red-600 font-bold tracking-widest">{{ optional($blog?->ChildCategories)[0]?->title }}</a>
            </div>
            <div class="w-full text-gray-800 text-4xl px-5 font-bold leading-none">
                <a href="{{ route('blog.details', $blog->slug) }}" class="hover:text-red-600">
                    {{ $blog->title }}
                </a>
            </div>

            @if ($blog->featured_image)
                <div class="m-5">
                    <img class="h-[500px]" src="{{ asset('storage/' . $blog->featured_image) }}">
                </div>
            @endif

            @if ($blog->image_caption)
                <div class="w-full text-gray-600 text-normal mx-5">
                    <p class="border-b py-3">{{ $blog->image_caption }}</p>
                </div>
            @endif

            <div class="w-full text-gray-600 font-thin italic px-5 pt-3">
                By <strong class="text-gray-700">--</strong><br>
                {{ $blog->created_at->since() }}<br>
                Updated: {{ $blog->updated_at->since() }}
            </div>

            <div class="px-5 w-full mx-auto">
                {!! $blog->description !!}
            </div>
        </div>

    @empty
        <div class="text-4xl text-red-300 text-center w-full h-screen flex justify-center item-center">No content found
        </div>
    @endforelse

    <div class="text-4xl py-20 text-red-300 text-center w-full flex justify-center item-center">
        {{ $blogs->links() }}
    </div>

    <x-FooterSection />
@endsection
