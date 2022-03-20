<x-app-layout>
    @livewire('customer.advisor.advisor-banner')
    <div class="mx-auto my-5 px-3 xs:px-4 xl:max-w-screen-2xl lg:px-5 py-5">
        @livewire('customer.advisor.advisor-list')
    </div>
    <div class="bg-secondary-100">
        @livewire('customer.advisor.advisor-carousel')
    </div>
    <div class="mx-auto my-5 px-3 xs:px-4 xl:max-w-screen-2xl lg:px-5 py-5">
        <div class="grid grid-cols-1 md:grid-cols-4 md:gap-10 gap-0">
            <div class="w-full col-span-2">
                <div class="px-5 md:px-10 py-10"><span class="text-2xl font-bold">areas of responsibility of the financial advisor</span></div>
                <div class="px-5 md:px-10">
                    <span class="md:text-lg text-md text-gray-700">The term "financial advisor", unlike that of the insurance advisor, is not protected by law. The financial advisor advises his clients on investments, loans and insurance. This advice is provided either on a case-by-case basis or as part of systematic financial planning.<br/><br/><br/>
                    Synonymously used terms for financial advisors are investment advisers, free or independent investment brokers, Financial Advisor or Financial Advisor . A distinction is made between two categories of financial advisors: financial advisors who are allowed to buy and sell financial services in accordance with the provisions of the German Banking Act (KWG) and financial advisors who are only allowed to sell investment funds, closed-end funds, financing and real estate in accordance with the rules of the Commercial Code (GewO). </span>
                </div>
            </div>
            <div class="w-full col-span-2">
                <img src="{{asset('assets/img/svg/advisor.svg')}}" class="w-full"/>
            </div>
        </div>
        <div>
            <div class="px-5 md:px-10 py-10">
                <span class="text-2xl font-bold">Financial advisor with a license in accordance with the trade regulations (GewO)</span>
            </div>
            <div class="px-5 md:px-10">
                <span class="md:text-lg text-md text-gray-700">
                    The financial advisor, with permission according to § 34f GewO, does not have a license under the Banking Act and is therefore limited in investment advice to investment funds. He may not make any statements about investments such as stocks or fixed-income securities. Financial advisors who advise on the subject of mortgage lending, however, require a permit according to §34i GewO. This paragraph was only newly created in 2016. Brokers who advise on the subject of insurance and sell corresponding products are subject to the provisions of §34d GewO (insurance broker) and §34e (insurance consultant). The brokerage of real estate is regulated in §34c GewO. In addition, there are a number of certifications, e.g. Certified DEFINO Consultant or Certified Financial Planner® , which are awarded on the basis of expert examinations and defined advisory rules. Financial advisors have brokerage agreements with a very different number of product providers and are mostly self-employed. As a rule, financial advisors receive contract and / or portfolio commissions from the product providers for their sales and support services. 
                </span>
            </div>
        </div>
    </div>
</x-app-layout>