@extends('welcome')
@section('content')
    <x-HeadingSection />
    <div class="w-full lg:w-3/5  sm:w-ful mx-auto">
        <div class="mx-5 my-3 text-sm">
            <a href=""
                class=" text-red-600 font-bold tracking-widest">{{ optional($blog?->ChildCategories)[0]?->title }}</a>
        </div>
        <div class="w-full text-gray-800 text-4xl px-5 font-bold leading-none">
            {{ $blog->title }}
        </div>

        @if ($blog->featured_image)
            <div class="m-5 w-full">
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

        <div class="px-5 w-full">
            <p>{!! nl2br($blog->description) !!}</p>
        </div>
    </div>
    <x-FooterSection />
@endsection
