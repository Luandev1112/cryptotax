<x-guest-layout>
    <div class="w-full bg-white">
        <x-sub-page-hero icon="terms" subtitle="" title="Privacy Policy"></x-sub-page-hero>
        <x-container class="py-14">
            <div class="relative">
                <h4 class="text-2xl font-bold">{{ __('Privacy Policy for myCrypto Tax') }}</h4>
                <p class="mt-8">{{ __("At myCryptoTax, accessible from mycrypto.tax/, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by myCryptoTax and how we use it.If you have additional questions or require more information about our Privacy Policy, do not hesitate to Contact us.") }}</p>
                <p class="mt-8">{{ __("This Privacy Policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collect in myCryptoTax. This policy is not applicable to any information collected offline or via channels other than this website.") }}</p>
    
                <p class="font-semibold text-lg my-8">{{  __('Information we collect') }}</p>
                <p>{{ __('Reduce unused rules from stylesheets and defer CSS not used for above-the-fold content to decrease bytes consumed by network activity. Learn more.FCPLCP') }}</p>
                <p class="pt-2">{{ __('If you contact us directly, we may receive additional information about you such as your name, email address, phone number, the contents of the message and/or attachments you may send us, and any other information you may choose to provide. When you register for an Account, we may ask for your contact information, including items such as name, company name, address, email address, and telephone number.') }}</p>
            
                <p class="font-semibold text-lg my-8">{{  __('How we use your information') }}</p>
                <p class="pb-3">{{ __('We use the information we collect in various ways, including to:') }}</p>
                @php
                    $terms = [
                        'Provide, operate, and maintain our website', 
                        'Improve, personalize, and expand our website',
                        'Understand and analyze how you use our website',
                        'Develop new products, services, features, and functionality',
                        'Communicate with you, either directly or through one of our partners, including for customer service, to provide you with',
                        'updates and other information relating to the website, and for marketing and promotional purposes',
                        'Send you emails',
                        'Find and prevent fraud'
                    ]
                @endphp
                
                @foreach ($terms as $term)
                    <div class="flex cl items-start py-2">
                        <div class="w-4 h-4 mr-3">
                            <x-icon name="square-dot" class="w-4 h-4 mt-1"/>
                        </div>
                        <p>{{ __( $term) }}</p>
                    </div>
                @endforeach

                <p class="font-semibold text-lg my-8">{{  __('Log Files') }}</p>
                <p>{{ __("myCryptoTax follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services' analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users' movement on the website, and gathering demographic information") }}</p>

                <p class="font-semibold text-lg my-8">{{  __('Cookies and Web Beacons') }}</p>
                <p class="pb-3">{{ __("Like any other website, myCryptoTax uses 'cookies'. These cookies are used to store information including visitors' preferences, and the pages on the website that the visitor accessed or visited. The information is used to optimize the users' experience by customizing our web page content based on visitors' browser type and/or other information.") }}</p>
                <p class="mt-4">{{ __('For more general information on cookies, please read the Cookies article on Generate Privacy Policy website.') }}</p>
            
                <p class="font-semibold text-lg my-8">{{  __("Children's Information") }}</p>
                <p>{{ __("Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and/or monitor and guide their online activity.") }}</p>
                <p class="mt-8">{{ __("myCryptoTax does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.") }}</p>  
            </div>
        </x-container>
        <x-footer-get-start/>
    </div>
    <x-footer></x-footer>
</x-guest-layout>