@props([
    'selected' => false,
    'name' => null,
    'category' => 1
])

@php    
    $att = $attributes->merge([
            'class' => 'grid grid-cols-7 items-center py-5 px-6 border-b cursor-pointer hover:bg-gray-100 w-full'
    ]);
    if ($selected) {
        $att = $attributes->merge([
            'class' => 'grid grid-cols-7 items-center py-5 px-6 border-b cursor-pointer bg-gray-100 w-full'
        ]);
    }
    $category_badge = ['name'=>'Exchange', 'icon' =>'exchange-1'];
    switch ($category) {
        case '1':
            $category_badge = ['name'=>'Exchange', 'icon' =>'exchange-1'];
            break;
        case '3':
            $category_badge = ['name'=>'Blockchain', 'icon' =>'blockchain'];
            break;
        default:
            break;
    }
@endphp
<button {{$att}}>
    <x-icon :name="$name" class="w-auto h-8 col-span-2"></x-icon>
    <p class="col-span-2">{{ $name }}</p>
    <div class="inline-flex items-center px-3 py-1 bg-primary rounded-md text-white col-span-2">
        <x-icon :name="$category_badge['icon']" class="w-8 h-8 mr-2 text"/>
        <span class="text-md font-bold tracking-tight">{{ __( $category_badge['name'] ) }}</span>
    </div>
    @if($selected) 
        <div class="w-full flex justify-end">
            <x-icon name="arrow-right" class="w-5 col-span-1"/>
        </div>
    @endif
</button>