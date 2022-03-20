<div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-5 md:mt-16 xl:mt-30">
    <div class="p-5">
        <p class="text-2xl lg:text-3xl xl:text-4xl font-bold my-5">{{ __('Frequently Asked Questions') }}</p>
        <p class="text-gray-400">{{ __("Here you'll find answers to the most common questions our users.") }}</p>
        <div class="mt-12 divide-y">
            @php
                $faqs = [ 
                    [ "title" => "Is SEO a risky and time consuming proposition?", "content" => "There are many variations of passages of Lorem Ipsum available but the majority suffered is alteration in that words which don't look even slightly." ],
                    [ "title" => "How to choose a perfect digital marketing plan?", "content" => "There are many variations of passages of Lorem Ipsum available but the majority suffered is alteration in that words which don't look even slightly." ],
                    [ "title" => "Is it feasible to go for a complete website audit?", "content" => "There are many variations of passages of Lorem Ipsum available but the majority suffered is alteration in that words which don't look even slightly." ]
                ]
            @endphp
            @foreach ($faqs as $faq)                            
                <x-faq-toggle-block :label="$faq['title']" :opened="true">{{ __($faq['content']) }}</x-faq-toggle-block>
            @endforeach
        </div>
    </div>
    <div class="p-5">
        <img src="{{ asset('assets/img/landing/landing_faqs.svg') }}" class="w-full h-auto" />
    </div>
</div>