<div class="py-10 sm:py-16">
    <div class="relative text-center">
        <div class="absolute left-1/2 -translate-x-1/2">
            <img src="{{ asset('assets/img/affiliate_landing/landing_logo_bg.svg') }}" class="mx-auto"/>
        </div>
        <h3 class="text-2xl lg:text-3xl xl:text-4xl font-bold my-5">{{ __('What our members are sayings') }}</h3>
        <img src="{{ asset('assets/img/landing/landing_testimonial_ fullmarks.svg') }}" class="flex mx-auto"/>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mt-18 relative">
            @php
                $reviews = [
                    [ 'content' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s", 'avatar' => 'assets/img/landing/landing_testimonial_avatar.svg', 'name'=>'Londynn Vargas', 'score' => 5 ],
                    [ 'content' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s", 'avatar' => 'assets/img/landing/landing_testimonial_avatar.svg', 'name'=>'Londynn Vargas', 'score' => 5 ],
                    [ 'content' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s", 'avatar' => 'assets/img/landing/landing_testimonial_avatar.svg', 'name'=>'Londynn Vargas', 'score' => 5 ],
                ]
            @endphp
            @foreach ($reviews as $review)                            
                <div class="bg-white shadow-sm rounded-md p-8 text-left">
                    <p class="leading-loose">{{ __($review['content']) }}</p>
                    <div class="flex items-center space-x-4 mt-8">
                        <img src="{{ asset($review['avatar']) }}" class="w-16 h-16 rounded-md"/>
                        <div>
                            <p class="text-lg font-bold">{{ __($review['name']) }}</p>
                            <div class="flex items-center space-x-1">
                                @for ($i = 0; $i < $review['score']; $i++)
                                    <x-icon name="star-1" class="w-5 h-5"/>                                            
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
