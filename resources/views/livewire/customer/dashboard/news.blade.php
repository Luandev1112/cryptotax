@php
    $news = [
        [ 
            'img' => '', 
            'title' => 'Cryptocurrency exchanges start blocking accounts', 
            'content' => 'Data is a real-time snapshot *Data is delayed at least 15 minutes. Global Business and Financial News, Stock Quotes, and Market Data and' 
        ],
        [
            'img' => '', 
            'title' => 'Cryptocurrency exchanges start blocking accounts', 
            'content' => 'Data is a real-time snapshot *Data is delayed at least 15 minutes. Global Business and Financial News, Stock Quotes, and Market Data and' 
        ]

    ]
@endphp

<div class="bg-white shadow-lg rounded-md p-5 h-full">
    <div class="flex justify-between items-center">
        <div class="flex items-center space-x-2">
            <x-icon name="news" class="w-8 h-8"/>
            <p class="mr-3 text-lg font-semibold">{{ __('Crypto News') }}</p>
        </div>
        <div class="flex items-center space-x-6">
            <button class="border rounded-full w-8 h-8 text-sm flex items-center justify-center bg-white hover:bg-primary text-primary hover:text-white">
                <x-icon name="fas-angle-left" class="w-4 h-4"/>
            </button>
            <button class="border rounded-full w-8 h-8 text-sm flex items-center justify-center bg-white hover:bg-primary text-primary hover:text-white">
                <x-icon name="fas-angle-right" class="w-4 h-4"/>
            </button>
        </div>
    </div>
    <div class="main-carousel mt-9 h-full">

        @foreach ($news as $item)          
            <div class="carousel-cell px-1 sm:px-3 w-full md:w-1/2">
                <div class="h-full w-full">
                    <img src="{{asset('assets/img/customer/news.svg')}}" class="w-full h-full object-cover"/>
                    <p class="text-base text-primary font-bold mt-6"> {{ __( $item['title'] ) }}</p>
                    <p class="text-gray-400 text-sm mt-2"> {{ __( $item['content'] ) }} </p>
                </div>
            </div>
        @endforeach
        
    </div>
</div>

@push('scripts')
<script type="module">
    var elem = document.querySelector('.main-carousel');
    var flkty = new Flickity( elem, {
        prevNextButtons: false,
        cellAlign: 'left',
        contain: true,
        pageDots: false
    });
</script>
@endpush