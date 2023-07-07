@extends('welcome')
@section('content')
    <div class="w-full border-b flex flex-row flex-wrap items-center p-1">
        <div class="w-1/5 p-3">
            <button class="text-2xl font-thin text-gray-600"><i class="fa fa-bars"></i></button>
        </div>
        <div class="w-3/5 p-3">
            <center class="text-4xl text-red-500 font-bold">{{ env('APP_NAME') }}</center>
        </div>
        <div class="w-1/5 flex flex-row flex-wrap">
            <ul class="w-3/4 flex flex-row flex-wrap text-xs font-semibold">
                <li class="mx-3"><a href="">MAGAZINE</a></li>
                <li class="mx-3"><a href="">THE AGENDA</a></li>
                <li class="mx-3"><a href="">PRO</a></li>
            </ul>
            <div class="w-1/4 text-lg text-gray-600"><a href=""><i class="fa fa-search"></i></a></div>
        </div>
    </div>
    @forelse ($blogs as $blog)
        <div class="w-full lg:w-3/5  sm:w-ful mx-auto">
            <div class="mx-5 my-3 text-sm">
                <a href="" class=" text-red-600 font-bold tracking-widest">CORONAVIRUS</a>
            </div>
            <div class="w-full text-gray-800 text-4xl px-5 font-bold leading-none">
                {{ $blog->title }}
            </div>

            <div class="w-full text-gray-500 px-5 pb-5 pt-2">
                The war of words comes after the governor sued the Atlanta mayor over her city’s mask mandate.
            </div>

            @if ($blog->featured_image)
                <div class="mx-5">
                    <img src="{{ asset('storage/' . $blog->featured_image) }}">
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


    <div class="w-full p-10 text-right text-sm bottom-0 mx-auto text-gray-400">
        Made with <i class="text-red-300 fa fa-heart"></i> By <a href="https://appenjel.com">Al Imran Suvro</a>
    </div>
@endsection
