<div class="w-full border-b flex flex-row flex-wrap items-center p-1">
    <div class="w-1/5 p-3">
        <button class="text-2xl font-thin text-gray-600"><i class="fa fa-bars"></i></button>
    </div>
    <div class="w-3/5 p-3">
        <center class="text-4xl text-red-500 font-bold">{{ env('APP_NAME') }}</center>
    </div>
    <div class="w-1/5 flex flex-row flex-wrap">
        <ul class="w-3/4 flex flex-row flex-wrap text-xs font-semibold">

            @foreach ($menu->items as $item)
                <li class="mx-3">
                    {{ $item['label'] }}

                    @if ($item['children'])
                        <ul>
                            {{-- Render the item's children here... --}}
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
        <div class="w-1/4 text-lg text-gray-600"><a href=""><i class="fa fa-search"></i></a></div>
    </div>
</div>
