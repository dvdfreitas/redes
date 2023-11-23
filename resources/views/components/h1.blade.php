@props(['mode' => 'normal'])
@if ($mode == "big")
    <div class="border p-4 my-8  hover:bg-red-500 text-4xl text-fuchsia-600 font-bold">
@else
    <div>
@endif
        {{ $slot }} 
    </div>
    