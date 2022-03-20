<template>
    <div class="font-sans antialiased min-h-screen bg-gray-100">
        <div class="min-h-screen flex">
            <!-- Static Desktop Sidebar -->
            <div class="hidden lg:block w-92 pt-24 px-6 bg-white shadow-lg" id="sideBar">
                <div class="max-w-md" v-if="$page.props.appLogo" v-html="$page.props.appLogo">
                </div>

                <h1 class="text-3xl font-bold text-gray-900" v-else>
                    {{ $page.props.appName }}
                </h1>

                <h2 class="mt-1 text-lg font-semibold text-gray-700">
                    {{ __('Billing Management') }}
                </h2>

                <div class="flex items-center mt-12 text-gray-600">
                    <div>
                        {{ __('Signed in as') }}
                    </div>

                    <img :src="$page.props.userAvatar" class="ml-2 h-6 w-6 rounded-full" v-if="$page.props.userAvatar"/>

                    <div :class="{'ml-1': ! $page.props.userAvatar, 'ml-2': $page.props.userAvatar}">
                        {{ $page.props.userName }}.
                    </div>
                </div>

                <div class="mt-3 text-sm text-gray-600" v-if="$page.props.billableName">
                    {{ __('Managing billing for :billableName', {billableName: $page.props.billableName}) }}.
                </div>

                <div class="mt-12 text-gray-600">
                    {{ __('Our billing management portal allows you to conveniently manage your subscription plan, payment method, and download your recent invoices.') }}
                </div>

                <div class="mt-12" id="sideBarTermsLink" v-if="$page.props.termsUrl">
                    <a :href="$page.props.termsUrl" class="text-gray-600 underline" target="_blank">
                        {{ __('Terms of Service') }}
                    </a>
                </div>

                <div class="mt-12" id="sideBarReturnLink">
                    <a :href="$page.props.dashboardUrl" class="flex items-center">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="arrow-left w-5 h-5 text-gray-400">
                            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                        </svg>

                        <div class="ml-2 text-gray-600 underline">
                            {{ __('Return to :appName', {appName: $page.props.appName}) }}
                        </div>
                    </a>
                </div>
            </div>

            <div class="flex-1">
                <!-- Mobile Top Nav -->
                <a :href="$page.props.dashboardUrl" class="lg:hidden flex items-center w-full px-4 py-4 bg-white shadow-lg" id="topNavReturnLink">
                    <svg viewBox="0 0 20 20" fill="currentColor" class="arrow-left w-4 h-4 text-gray-400">
                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                    </svg>

                    <div class="ml-2 text-gray-600 underline">
                        {{ __('Return to :appName', {appName: $page.props.appName}) }}
                    </div>
                </a>

                <!-- Main Content -->
                <div class="pb-6 pt-6 lg:pt-24 lg:pb-24 lg:max-w-4xl lg:mx-auto">
                    <!-- Error Messages -->
                    <error-messages class="mb-10 sm:px-8" :errors="errors" v-if="errors.length > 0"/>

                    <!-- Subscription Form (Shown After A Plan Is Selected) -->
                    <div v-show="subscribing">
                        <section-heading class="px-4 sm:px-8">
                            {{ __('Subscribe') }}
                        </section-heading>

                        <div class="mt-6 sm:px-8">
                            <div class="bg-white sm:rounded-lg shadow-sm overflow-hidden" v-if="subscribing">
                                <plan :plan="subscribing" :seat-name="$page.props.seatName"/>
                            </div>

                            <div class="mt-6 bg-white sm:rounded-lg shadow-sm overflow-hidden">
                                <div class="px-6 py-4">
                                    <h2 class="text-xl font-semibold text-gray-700">
                                        {{ __('Subscription Information') }}
                                    </h2>

                                    <div class="mt-6 flex items-center">
                                        <span class="w-1/3 mr-10 text-gray-800 text-sm font-semibold">{{ __('Card') }}</span>

                                        <div id="card-element" class="w-full bg-white border border-gray-200 p-3 rounded"></div>
                                    </div>

                                    <div class="mt-1 flex items-center" v-if="! showingCouponCode">
                                        <span class="w-1/3 mr-10">&nbsp;</span>

                                        <button class="w-full text-gray-400 text-sm underline text-left active:outline-none focus:outline-none" @click="showCouponCode">
                                            {{ __('Have a coupon code?') }}
                                        </button>
                                    </div>

                                    <div class="mt-6 flex items-center" v-if="showingCouponCode">
                                        <label for="coupon" class="w-1/3 mr-10 text-gray-800 text-sm font-semibold">{{ __('Coupon') }}</label>

                                        <input type="text" id="coupon" ref="coupon"
                                               v-model="subscriptionForm.coupon"
                                               :placeholder="__('Coupon')"
                                               @keyup.enter="confirmSubscription"
                                               class="w-full bg-white border border-gray-200 px-3 py-2 rounded outline-none"/>
                                    </div>

                                    <template v-if="collectsVat || collectsBillingAddress">
                                        <div class="mt-6 flex items-center">
                                            <span class="w-1/3 mr-10 text-gray-800 text-sm font-semibold">{{ __('Country') }}</span>

                                            <select name="country" id="country"
                                                    v-model="subscriptionForm.country"
                                                    class="form-select w-full bg-white border border-gray-200 px-3 py-2 rounded outline-none">
                                                <option value="" disabled="">{{ __('Select') }}</option>
                                                <option v-for="(name, iso) in $page.props.countries" :value="iso">{{ name }}</option>
                                            </select>
                                        </div>

                                        <div class="mt-1 flex items-center" v-if="! addingVatNumber && vatComplicit">
                                            <span class="w-1/3 mr-10">&nbsp;</span>

                                            <button class="w-full text-gray-400 text-sm underline text-left active:outline-none focus:outline-none" @click="showVatNumber">
                                                {{ __('Add VAT Number') }}
                                            </button>
                                        </div>

                                        <template v-if="(addingVatNumber && vatComplicit) || collectsBillingAddress">
                                            <div v-if="addingVatNumber"
                                                 class="mt-6 flex items-center">
                                                <label for="vat" class="w-1/3 mr-10 text-gray-800 text-sm font-semibold">{{ __('VAT Number') }}</label>

                                                <input type="text" id="vat" ref="vat"
                                                       v-model="subscriptionForm.vat"
                                                       :placeholder="__('VAT Number')"
                                                       class="w-full bg-white border border-gray-200 px-3 py-2 rounded outline-none"/>
                                            </div>

                                            <div class="mt-6 flex items-center">
                                                <label for="address" class="w-1/3 mr-10 text-gray-800 text-sm font-semibold">{{ __('Address') }}</label>

                                                <input type="text" id="address" ref="address"
                                                       v-model="subscriptionForm.address"
                                                       :placeholder="__('Address')"
                                                       class="w-full bg-white border border-gray-200 px-3 py-2 rounded outline-none"/>
                                            </div>

                                            <div class="mt-6 flex items-center">
                                                <label for="address2" class="w-1/3 mr-10 text-gray-800 text-sm font-semibold">{{ __('Address Line 2') }}</label>

                                                <input type="text" id="address2" ref="address2"
                                                       v-model="subscriptionForm.address2"
                                                       :placeholder="__('Address Line 2')"
                                                       class="w-full bg-white border border-gray-200 px-3 py-2 rounded outline-none"/>
                                            </div>

                                            <div class="mt-6 flex items-center">
                                                <label for="city" class="w-1/3 mr-10 text-gray-800 text-sm font-semibold">{{ __('City') }}</label>

                                                <input type="text" id="city" ref="city"
                                                       v-model="subscriptionForm.city"
                                                       :placeholder="__('City')"
                                                       class="w-full bg-white border border-gray-200 px-3 py-2 rounded outline-none"/>
                                            </div>

                                            <div class="mt-6 flex items-center">
                                                <label for="state" class="w-1/3 mr-10 text-gray-800 text-sm font-semibold">{{ __('State / County') }}</label>

                                                <input type="text" id="state" ref="state"
                                                       v-model="subscriptionForm.state"
                                                       :placeholder="__('State / County')"
                                                       class="w-full bg-white border border-gray-200 px-3 py-2 rounded outline-none"/>
                                            </div>

                                            <div class="mt-6 flex items-center">
                                                <label for="postal_code" class="w-1/3 mr-10 text-gray-800 text-sm font-semibold">{{ __('Zip / Postal Code') }}</label>

                                                <input type="text" id="postal_code" ref="postal_code"
                                                       v-model="subscriptionForm.postal_code"
                                                       :placeholder="__('Zip / Postal Code')"
                                                       class="w-full bg-white border border-gray-200 px-3 py-2 rounded outline-none"/>
                                            </div>
                                        </template>
                                    </template>

                                    <div class="mt-6 flex">
                                        <label for="extra" class="w-1/3 mr-10 mt-2 text-gray-800 text-sm font-semibold">{{ __('Extra Billing Information') }}</label>

                                        <textarea id="extra" rows="5"
                                                  v-model="subscriptionForm.extra"
                                                  :placeholder="__('If you need to add specific contact or tax information to your receipts, like your full business name, VAT identification number, or address of record, you may add it here.')"
                                                  class="w-full bg-white border border-gray-200 px-3 py-2 rounded focus:outline-none"></textarea>
                                    </div>

                                    <div v-if="enforcesAcceptingTerms" class="mt-6 flex">
                                        <label for="extra" class="w-1/3 mr-10 mt-2 text-gray-800 text-sm font-semibold"></label>

                                        <div class="flex items-center w-full">
                                            <input class="" type="checkbox" name="accept" v-model="subscriptionForm.accept">
                                            <a class="ml-2 text-sm font-semibold underline" :href="$page.props.termsUrl">{{__('I accept the terms of service')}}.</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="px-6 py-4 mt-5 bg-gray-100 bg-opacity-50 border-t border-gray-100 flex items-center">
                                    <div v-if="! loadingTaxCalculations">
                                        <span v-if="checkoutAmount" v-html="__('Total:') + ' ' + checkoutAmount"></span>
                                        <span v-if="checkoutTax" v-html="'(' + checkoutTax + ' ' + __('TAX') + ')'" class="ml-1 text-gray-600"></span>
                                    </div>

                                    <div v-else>
                                        ...
                                    </div>

                                    <spark-button class="ml-auto" @click.native="confirmSubscription" disabled="true" ref="confirmSubscriptionButton">
                                        {{ __('Subscribe') }}
                                    </spark-button>
                                </div>
                            </div>
                        </div>

                        <!-- Nevermind -->
                        <button class="flex items-center mt-4 px-4 sm:px-8" @click="subscribing = false">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="text-gray-400 w-4 h-4">
                                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                            </svg>

                            <div class="ml-2 text-sm text-gray-600 underline">
                                {{ __('Select a different plan') }}
                            </div>
                        </button>
                    </div>

                    <div v-show="! subscribing">
                        <!-- Subscribe -->
                        <div v-if="$page.props.state == 'none'">
                            <section-heading class="px-4 sm:px-8">
                                {{ __('Subscribe') }}
                            </section-heading>

                            <div class="mt-6 sm:px-8">
                                <info-messages class="mb-10" v-if="! $page.props.genericTrialEndsAt">
                                    {{ __('It looks like you do not have an active subscription. You may choose one of the subscription plans below to get started. Subscription plans may be changed or cancelled at your convenience.') }}
                                </info-messages>

                                <info-messages class="mb-10" v-else>
                                    {{ __('You are currently within your free trial period. Your trial will expire on :date.', {'date': $page.props.genericTrialEndsAt}) }}
                                </info-messages>
                            </div>

                            <!-- Interval Selector -->
                            <interval-selector class="mt-6 px-4 sm:px-8"
                                               :showing-default-interval-plans="showingPlansOfInterval == $page.props.defaultInterval"
                                               @toggled="toggleDisplayedPlanIntervals"
                                               v-if="monthlyPlans.length > 0 && yearlyPlans.length > 0"/>

                            <transition name="component-fade" mode="out-in">
                                <!-- Monthly Plans -->
                                <plan-list class="mt-6 sm:px-8" key="subscribe-monthly-plans"
                                           :plans="monthlyPlans"
                                           interval="monthly"
                                           :seat-name="seatName"
                                           :current-plan="plan"
                                           @plan-selected="startSubscribingToPlan($event)"
                                           v-if="monthlyPlans.length > 0 && showingPlansOfInterval == 'monthly'"/>

                                <!-- Yearly Plans -->
                                <plan-list class="mt-6 sm:px-8" key="subscribe-yearly-plans"
                                           :plans="yearlyPlans"
                                           interval="yearly"
                                           :seat-name="seatName"
                                           :current-plan="plan"
                                           @plan-selected="startSubscribingToPlan($event)"
                                           v-if="yearlyPlans.length > 0 && showingPlansOfInterval == 'yearly'"/>
                            </transition>
                        </div>

                        <!-- Active Subscription -->
                        <div v-if="$page.props.state == 'active'">
                            <!-- Change Subscription Plan -->
                            <section-heading class="px-4 sm:px-8" v-if="! selectingNewPlan">
                                {{ __('Current Subscription Plan') }}
                            </section-heading>

                            <section-heading class="px-4 sm:px-8" v-else>
                                {{ __('Change Subscription Plan') }}
                            </section-heading>

                            <div class="mt-6 sm:px-8">
                                <info-messages class="mb-10" v-if="$page.props.trialEndsAt">
                                    {{ __('You are currently within your free trial period. Your trial will expire on :date.', {'date': $page.props.trialEndsAt}) }}
                                </info-messages>

                                <div class="bg-white sm:rounded-lg shadow-sm" v-if="! selectingNewPlan">
                                    <plan :plan="plan" :seat-name="seatName" :hide-incentive="true"/>

                                    <div class="px-6 pb-4">
                                        <spark-button class="mt-4" v-if="(monthlyPlans.length + yearlyPlans.length) > 1"
                                                      @click.native="selectingNewPlan = true">
                                            {{ __('Change Subscription Plan') }}
                                        </spark-button>
                                    </div>
                                </div>
                            </div>

                            <div v-if="selectingNewPlan">
                                <!-- Interval Selector -->
                                <interval-selector class="mt-6 px-4 sm:px-8"
                                                   :showing-default-interval-plans="showingPlansOfInterval == $page.props.defaultInterval"
                                                   @toggled="toggleDisplayedPlanIntervals"
                                                   v-if="monthlyPlans.length > 0 && yearlyPlans.length > 0"/>

                                <transition name="component-fade" mode="out-in">
                                    <!-- Monthly Plans -->
                                    <plan-list class="mt-6 sm:px-8" key="change-monthly-plans"
                                               :plans="monthlyPlans"
                                               interval="monthly"
                                               :seat-name="seatName"
                                               :current-plan="plan"
                                               @plan-selected="switchToPlan($event)"
                                               v-if="monthlyPlans.length > 0 && showingPlansOfInterval == 'monthly'"/>

                                    <!-- Yearly Plans -->
                                    <plan-list class="mt-6 sm:px-8" key="change-yearly-plans"
                                               :plans="yearlyPlans"
                                               interval="yearly"
                                               :current-plan="plan"
                                               :seat-name="seatName"
                                               @plan-selected="switchToPlan($event)"
                                               v-if="yearlyPlans.length > 0 && showingPlansOfInterval == 'yearly'"/>
                                </transition>

                                <!-- Nevermind, Keep Old Plan -->
                                <button class="flex items-center mt-4 px-4 sm:px-8" @click="selectingNewPlan = false">
                                    <svg viewBox="0 0 20 20" fill="currentColor" class="text-gray-400 w-4 h-4">
                                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                                    </svg>

                                    <div class="ml-2 text-sm text-gray-600 underline">
                                        {{ __('Nevermind, I\'ll keep my old plan') }}
                                    </div>
                                </button>
                            </div>

                            <!-- Update Billing Information -->
                            <div class="mt-10" v-if="!selectingNewPlan">
                                <section-heading class="px-4 sm:px-8">
                                    {{ __('Payment Information') }}
                                </section-heading>

                                <div class="mt-3 sm:px-8">
                                    <div class="bg-white sm:rounded-lg shadow-sm overflow-hidden">
                                        <div class="px-6 py-4">
                                            <p class="max-w-2xl text-sm text-gray-600" v-if="$page.props.paymentMethod == 'card'"
                                               v-html="__('Your current payment method is a credit card ending in :lastFour that expires on :expiration.', {
                                                    lastFour: '<span class=\'font-semibold\'>'+$page.props.cardLastFour+'</span>',
                                                    expiration: '<span class=\'font-semibold\'>'+$page.props.cardExpirationDate+'</span>'
                                                })">
                                            </p>

                                            <p class="max-w-2xl text-sm text-gray-600 mt-3" v-if="$page.props.billable.vat_id"
                                               v-html="__('Your registered VAT Number is :vatNumber.', {
                                                    vatNumber: '<span class=\'font-semibold\'>'+$page.props.billable.vat_id+'</span>',
                                                })">
                                            </p>

                                            <spark-button class="mt-4" @click.native="updatingPaymentMethod = true" v-if="!updatingPaymentMethod">
                                                {{ __('Update Payment Information') }}
                                            </spark-button>

                                            <div class="mt-6 flex items-center" v-if="updatingPaymentMethod">
                                                <span class="w-1/3 mr-10 text-gray-800 text-sm font-semibold">{{ __('Card') }}</span>

                                                <div id="payment-card-element" class="w-full border border-gray-200 p-3 rounded"></div>
                                            </div>

                                            <template v-if="updatingPaymentMethod && (collectsVat || collectsBillingAddress)">
                                                <div v-if="collectsVat"
                                                     class="mt-6 flex items-center">
                                                    <label for="vat" class="w-1/3 mr-10 text-gray-800 text-sm font-semibold">{{ __('VAT Number') }}</label>

                                                    <input type="text" id="vat" ref="vat"
                                                           v-model="paymentInformationForm.vat"
                                                           :placeholder="__('VAT Number')"
                                                           class="w-full bg-white border border-gray-200 px-3 py-2 rounded outline-none"/>
                                                </div>

                                                <div class="mt-6 flex items-center">
                                                    <label for="address" class="w-1/3 mr-10 text-gray-800 text-sm font-semibold">{{ __('Address') }}</label>

                                                    <input type="text" id="address" ref="address"
                                                           v-model="paymentInformationForm.address"
                                                           :placeholder="__('Address')"
                                                           class="w-full bg-white border border-gray-200 px-3 py-2 rounded outline-none"/>
                                                </div>

                                                <div class="mt-6 flex items-center">
                                                    <label for="address2" class="w-1/3 mr-10 text-gray-800 text-sm font-semibold">{{ __('Address Line 2') }}</label>

                                                    <input type="text" id="address2" ref="address2"
                                                           v-model="paymentInformationForm.address2"
                                                           :placeholder="__('Address Line 2')"
                                                           class="w-full bg-white border border-gray-200 px-3 py-2 rounded outline-none"/>
                                                </div>

                                                <div class="mt-6 flex items-center">
                                                    <label for="city" class="w-1/3 mr-10 text-gray-800 text-sm font-semibold">{{ __('City') }}</label>

                                                    <input type="text" id="city" ref="city"
                                                           v-model="paymentInformationForm.city"
                                                           :placeholder="__('City')"
                                                           class="w-full bg-white border border-gray-200 px-3 py-2 rounded outline-none"/>
                                                </div>

                                                <div class="mt-6 flex items-center">
                                                    <label for="state" class="w-1/3 mr-10 text-gray-800 text-sm font-semibold">{{ __('State / County') }}</label>

                                                    <input type="text" id="state" ref="state"
                                                           v-model="paymentInformationForm.state"
                                                           :placeholder="__('State / County')"
                                                           class="w-full bg-white border border-gray-200 px-3 py-2 rounded outline-none"/>
                                                </div>

                                                <div class="mt-6 flex items-center">
                                                    <label for="postal_code" class="w-1/3 mr-10 text-gray-800 text-sm font-semibold">{{ __('Zip / Postal Code') }}</label>

                                                    <input type="text" id="postal_code" ref="postal_code"
                                                           v-model="paymentInformationForm.postal_code"
                                                           :placeholder="__('Zip / Postal Code')"
                                                           class="w-full bg-white border border-gray-200 px-3 py-2 rounded outline-none"/>
                                                </div>

                                                <div class="mt-6 flex items-center">
                                                    <span class="w-1/3 mr-10 text-gray-800 text-sm font-semibold">{{ __('Country') }}</span>

                                                    <select name="country" id="country"
                                                            v-model="paymentInformationForm.country"
                                                            class="form-select w-full bg-white border border-gray-200 px-3 py-2 rounded outline-none">
                                                        <option value="" disabled="">{{ __('Select') }}</option>
                                                        <option v-for="(name, iso) in $page.props.countries" :value="iso">{{ name }}</option>
                                                    </select>
                                                </div>
                                            </template>
                                        </div>

                                        <div class="px-6 py-4 mt-5 bg-gray-100 bg-opacity-50 border-t border-gray-100 text-right" v-if="updatingPaymentMethod">
                                            <spark-button @click.native="updatePaymentMethod" disabled="true" ref="updatePaymentMethodButton">
                                                {{ __('Update Payment Information') }}
                                            </spark-button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Apply Coupons -->
                            <section-heading class="mt-10 px-4 sm:px-8">
                                {{ __('Apply Coupon') }}
                            </section-heading>

                            <div class="mt-3 sm:px-8">
                                <div class="bg-white sm:rounded-lg shadow-sm">
                                    <div class="px-6 py-4 ">
                                        <div class="mt-6 flex">
                                            <label for="coupon_for_existing" class="w-1/3 mr-10 mt-2 text-gray-800 text-sm font-semibold">{{ __('Coupon') }}</label>

                                            <input type="text" id="coupon_for_existing" ref="coupon_for_existing"
                                                   v-model="couponForm.coupon"
                                                   :placeholder="__('Coupon')"
                                                   class="w-full bg-white border border-gray-200 px-3 py-2 rounded outline-none"/>
                                        </div>
                                    </div>

                                    <div class="px-6 py-4 mt-5 bg-gray-100 bg-opacity-50 border-t border-gray-100 text-right">
                                        <spark-button @click.native="applyCoupon">
                                            {{ __('Apply') }}
                                        </spark-button>
                                    </div>
                                </div>
                            </div>

                            <!-- Cancel Subscription -->
                            <section-heading class="mt-10 px-4 sm:px-8">
                                {{ __('Cancel Subscription') }}
                            </section-heading>

                            <div class="mt-3 sm:px-8">
                                <div class="px-6 py-4 bg-white sm:rounded-lg shadow-sm">
                                    <div class="max-w-2xl text-sm text-gray-600">
                                        {{ __('You may cancel your subscription at any time. Once your subscription has been cancelled, you will have the option to resume the subscription until the end of your current billing cycle.') }}
                                    </div>

                                    <div class="mt-4">
                                        <spark-secondary-button @click.native="cancelSubscription">
                                            {{ __('Cancel Subscription') }}
                                        </spark-secondary-button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- On Grace Period / Subscription Paused -->
                        <div v-if="$page.props.state == 'onGracePeriod'">
                            <!-- Resume Subscription -->
                            <section-heading class="px-4 sm:px-8">
                                {{ __('Resume Subscription') }}
                            </section-heading>

                            <div class="mt-3 sm:px-8">
                                <div class="px-6 py-4 bg-white sm:rounded-lg shadow-sm">
                                    <div class="max-w-2xl text-sm text-gray-600">
                                        {{ __('Having second thoughts about cancelling your subscription? You can instantly reactive your subscription at any time until the end of your current billing cycle. After your current billing cycle ends, you may choose an entirely new subscription plan.') }}
                                    </div>

                                    <div class="mt-4">
                                        <spark-button @click.native="resumeSubscription">
                                            {{ __('Resume Subscription') }}
                                        </spark-button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Extra Billing Information -->
                        <div class="mt-10" v-if="$page.props.state != 'none' && !selectingNewPlan">
                            <section-heading class="px-4 sm:px-8">
                                {{ __('Billing Information') }}
                            </section-heading>

                            <div class="mt-3 sm:px-8">
                                <div class="bg-white sm:rounded-lg shadow-sm">
                                    <div class="px-6 py-4 ">
                                        <div class="max-w-2xl text-sm text-gray-600">
                                            {{ __('If you need to add specific contact or tax information to your receipts, like your full business name, VAT identification number, or address of record, you may add it here.') }}
                                        </div>

                                        <div class="mt-6 flex">
                                            <label for="extra" class="w-1/3 mr-10 mt-2 text-gray-800 text-sm font-semibold">{{ __('Extra Billing Information') }}</label>

                                            <textarea id="extra" rows="3"
                                                      v-model="billingInformationForm.extra"
                                                      class="w-full border border-gray-200 px-3 py-2 rounded focus:outline-none"></textarea>
                                        </div>
                                    </div>

                                    <div class="px-6 py-4 mt-5 bg-gray-100 bg-opacity-50 border-t border-gray-100 text-right">
                                        <spark-button @click.native="updateBillingInformation">
                                            {{ __('Update') }}
                                        </spark-button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Receipts Emails -->
                        <div class="mt-10" v-if="$page.props.sendsReceiptsToCustomAddresses">
                            <section-heading class="px-4 sm:px-8">
                                {{ __('Receipt Email Addresses') }}
                            </section-heading>

                            <div class="mt-3 sm:px-8">
                                <div class="bg-white sm:rounded-lg shadow-sm">
                                    <div class="px-6 py-4 ">
                                        <div class="max-w-2xl text-sm text-gray-600">
                                            {{ __('We will send a receipt download link to the email addresses that you specify below. You may separate multiple email addresses using commas.') }}
                                        </div>

                                        <div class="mt-6 flex">
                                            <label for="receipt_emails" class="w-1/3 mr-10 mt-2 text-gray-800 text-sm font-semibold">{{ __('Email Addresses') }}</label>

                                            <input type="text" id="receipt_emails" ref="city"
                                                   v-model="receiptEmailsForm.receipt_emails"
                                                   :placeholder="__('Email Addresses')"
                                                   class="w-full bg-white border border-gray-200 px-3 py-2 rounded outline-none"/>
                                        </div>
                                    </div>

                                    <div class="px-6 py-4 mt-5 bg-gray-100 bg-opacity-50 border-t border-gray-100 text-right">
                                        <spark-button @click.native="updateReceiptEmails">
                                            {{ __('Save') }}
                                        </spark-button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Receipts -->
                        <div class="mt-10" v-if="$page.props.receipts.length > 0">
                            <section-heading class="px-4 sm:px-8">
                                {{ __('Receipts') }}
                            </section-heading>

                            <receipt-list class="mt-3 sm:px-8" :receipts="$page.props.receipts"/>
                        </div>

                        <div class="text-center mt-10 lg:hidden" id="footerTermsLink" v-if="$page.props.termsUrl">
                            <a :href="$page.props.termsUrl" class="text-gray-600 underline">
                                {{ __('Terms of Service') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="overlay" v-if="processing">
            <div class="lds-ring">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>

    <!-- bg-gray-50 bg-gray-100 bg-gray-200 bg-gray-300 bg-gray-400 bg-gray-500 bg-gray-600 bg-gray-700 bg-gray-800 bg-gray-900 -->
    <!-- bg-red-50 bg-red-100 bg-red-200 bg-red-300 bg-red-400 bg-red-500 bg-red-600 bg-red-700 bg-red-800 bg-red-900 -->
    <!-- bg-yellow-50 bg-yellow-100 bg-yellow-200 bg-yellow-300 bg-yellow-400 bg-yellow-500 bg-yellow-600 bg-yellow-700 bg-yellow-800 bg-yellow-900 -->
    <!-- bg-green-50 bg-green-100 bg-green-200 bg-green-300 bg-green-400 bg-green-500 bg-green-600 bg-green-700 bg-green-800 bg-green-900 -->
    <!-- bg-blue-50 bg-blue-100 bg-blue-200 bg-blue-300 bg-blue-400 bg-blue-500 bg-blue-600 bg-blue-700 bg-blue-800 bg-blue-900 -->
    <!-- bg-indigo-50 bg-indigo-100 bg-indigo-200 bg-indigo-300 bg-indigo-400 bg-indigo-500 bg-indigo-600 bg-indigo-700 bg-indigo-800 bg-indigo-900 -->
    <!-- bg-purple-50 bg-purple-100 bg-purple-200 bg-purple-300 bg-purple-400 bg-purple-500 bg-purple-600 bg-purple-700 bg-purple-800 bg-indigo-900 -->
    <!-- bg-pink-50 bg-pink-100 bg-pink-200 bg-pink-300 bg-pink-400 bg-pink-500 bg-pink-600 bg-pink-700 bg-pink-800 bg-indigo-900 -->
</template>

<script>
import ErrorMessages from './../Components/ErrorMessages';
import InfoMessages from './../Components/InfoMessages';
import FormatsValues from './../Mixins/FormatsValues';
import IntervalSelector from './../Components/IntervalSelector';
import Plan from './../Components/Plan';
import PlanList from './../Components/PlanList';
import PlanSectionHeading from './../Components/PlanSectionHeading';
import ReceiptList from './../Components/ReceiptList';
import SectionHeading from './../Components/SectionHeading';
import SparkButton from './../Components/Button';
import SparkSecondaryButton from './../Components/SecondaryButton';
import {Inertia} from '@inertiajs/inertia'

export default {
    mixins: [FormatsValues],

    components: {
        ErrorMessages,
        InfoMessages,
        IntervalSelector,
        Plan,
        PlanList,
        PlanSectionHeading,
        ReceiptList,
        SectionHeading,
        SparkButton,
        SparkSecondaryButton,
    },

    props: [
        'billableId',
        'billableType',
        'enforcesAcceptingTerms',
        'collectsVat',
        'collectsBillingAddress',
        'monthlyPlans',
        'paddleVendorId',
        'paymentMethod',
        'plan',
        'seatName',
        'userName',
        'yearlyPlans',
    ],

    data() {
        return {
            errors: [],
            processing: false,
            stripe: null,

            showingPlansOfInterval: 'monthly',

            subscribing: null,
            subscriptionCardElement: null,
            showingCouponCode: false,
            addingVatNumber: false,
            subscriptionForm: {
                coupon: null,
                country: '',
                accept: false,
                vat: '',
                postal_code: '',
                address: '',
                address2: '',
                city: '',
                state: '',
                extra: ''
            },

            checkoutTax: 0,
            checkoutAmount: 0,
            loadingTaxCalculations: true,

            paymentInformationForm: {
                country: '',
                vat: '',
                postal_code: '',
                address: '',
                address2: '',
                city: '',
                state: '',
                extra: ''
            },

            receiptEmailsForm: {
                receipt_emails: '',
            },

            couponForm: {
                coupon: '',
            },

            selectingNewPlan: false,
            updatingPaymentMethod: false,
            paymentMethodCardElement: null,

            billingInformationForm: {
                extra: ''
            },
        };
    },

    watch: {
        updatingPaymentMethod(val) {
            if (!val) {
                return;
            }

            this.$nextTick(() => {
                this.paymentMethodCardElement = this.createCardElement('#payment-card-element');

                this.paymentMethodCardElement.on('ready', () => {
                    this.paymentMethodCardElement.focus()
                });

                this.paymentMethodCardElement.on('change', (event) => {
                    if (event.complete) {
                        this.$refs.updatePaymentMethodButton.$el.removeAttribute('disabled')
                    }
                })
            })
        },

        subscribing(val) {
            if (!val) {
                window.history.pushState({}, document.title, window.location.pathname);
            } else {
                window.history.pushState({}, document.title, window.location.pathname + '?subscribe=' + val.id);

                this.calculatingTax(this.subscribing, (data) => {
                    this.checkoutTax = data.tax;
                    this.checkoutAmount = data.total;
                });
            }

            this.checkoutTax = 0;

            if (!this.$page.props.billable.vat_id) {
                this.addingVatNumber = false;
            }
        },

        'subscriptionForm.country'(val) {
            if (!this.$page.props.billable.vat_id) {
                this.addingVatNumber = false;
            }

            if (this.collectsVat && this.subscribing) {
                this.calculatingTax(this.subscribing, (data) => {
                    this.checkoutTax = data.tax;
                    this.checkoutAmount = data.total;
                });
            }
        },

        'subscriptionForm.vat': _.debounce(function () {
            if (this.collectsVat && this.subscribing) {
                this.calculatingTax(this.subscribing, (data) => {
                    this.checkoutTax = data.tax;
                    this.checkoutAmount = data.total;
                });
            }
        }, 500)
    },

    /**
     * Initialize the component.
     */
    mounted() {
        this.stripe = Stripe(this.$page.props.stripeKey, {
            apiVersion: this.$page.props.stripeVersion
        });

        this.subscriptionForm.extra = this.$page.props.billable.extra_billing_information;
        this.subscriptionForm.address = this.$page.props.billable.billing_address;
        this.subscriptionForm.address2 = this.$page.props.billable.billing_address_line_2;
        this.subscriptionForm.city = this.$page.props.billable.billing_city;
        this.subscriptionForm.state = this.$page.props.billable.billing_state;
        this.subscriptionForm.postal_code = this.$page.props.billable.billing_postal_code;
        this.subscriptionForm.country = this.$page.props.billable.billing_country || '';
        this.subscriptionForm.vat = this.$page.props.billable.vat_id;

        this.paymentInformationForm.address = this.$page.props.billable.billing_address;
        this.paymentInformationForm.address2 = this.$page.props.billable.billing_address_line_2;
        this.paymentInformationForm.city = this.$page.props.billable.billing_city;
        this.paymentInformationForm.state = this.$page.props.billable.billing_state;
        this.paymentInformationForm.postal_code = this.$page.props.billable.billing_postal_code;
        this.paymentInformationForm.country = this.$page.props.billable.billing_country;
        this.paymentInformationForm.vat = this.$page.props.billable.vat_id;

        if (this.$page.props.billable.vat_id) {
            this.addingVatNumber = true;
        }

        this.billingInformationForm.extra = this.$page.props.billable.extra_billing_information;

        this.receiptEmailsForm.receipt_emails = this.$page.props.billable.receipt_emails.join(',');

        Inertia.on('invalid', (event) => {
            event.preventDefault();

            if (event.detail.response.request.responseURL) {
                window.location.href = event.detail.response.request.responseURL;
            } else {
                console.error(event);
            }
        });

        if (this.monthlyPlans.length == 0 &&
            this.yearlyPlans.length > 0) {
            this.showingPlansOfInterval = 'yearly';
        } else {
            this.showingPlansOfInterval = this.$page.props.defaultInterval;
        }

        if (this.$page.props.state == 'none' && this.$page.props.subscribingTo) {
            this.startSubscribingToPlan(this.$page.props.subscribingTo);
        }

        if (this.collectsVat && !this.$page.props.billable.billing_country) {
            this.subscriptionForm.country = this.$page.props.homeCountry;
        }
    },

    computed: {
        vatComplicit() {
            return this.collectsVat ? _.includes([
                'BE', 'BG', 'CZ', 'DK', 'DE',
                'EE', 'IE', 'GR', 'ES', 'FR',
                'HR', 'IT', 'CY', 'LV', 'LT',
                'LU', 'HU', 'MT', 'NL', 'AT',
                'PL', 'PT', 'RO', 'SI', 'SK',
                'FI', 'SE', 'GB',
            ], this.subscriptionForm.country) : false;
        }
    },

    methods: {
        /**
         * Initialize the Stripe Elements for the page.
         */
        createCardElement(container) {
            var card = this.stripe.elements({
                fonts: [{
                    cssSrc: 'https://fonts.googleapis.com/css?family=Nunito:400,600,700'
                }],
            }).create('card', {
                hideIcon: true,
                hidePostalCode: true,
                style: {
                    base: {
                        '::placeholder': {
                            color: '#aab7c4'
                        },
                        fontFamily: 'Nunito, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"',
                        color: '#000000',
                        fontSize: '16px',
                        fontWeight: '400',
                        fontSmoothing: 'antialiased'
                    }
                }
            });

            card.mount(container);

            return card;
        },


        /**
         * Begin the process of subscription to a plan.
         */
        startSubscribingToPlan(plan) {
            this.subscribing = plan;

            this.subscriptionCardElement = this.createCardElement('#card-element');

            this.subscriptionCardElement.on('ready', () => {
                this.subscriptionCardElement.focus()
            });

            this.subscriptionCardElement.on('change', (event) => {
                if (event.complete) {
                    this.$refs.confirmSubscriptionButton.$el.removeAttribute('disabled')
                }
            })
        },

        /**
         * Actually create a new subscription for the billable.
         */
        confirmSubscription() {
            if (this.enforcesAcceptingTerms && !this.subscriptionForm.accept) {
                this.errors = [this.__('Please accept the terms of service.')];

                return;
            }

            this.processing = true;

            this.generateSetupIntentToken(secret => {
                let payload = {
                    name: this.$page.props.userName
                };

                if (this.subscriptionForm.country) {
                    payload.address = {
                        line1: this.subscriptionForm.address || '',
                        line2: this.subscriptionForm.address2 || '',
                        city: this.subscriptionForm.city || '',
                        state: this.subscriptionForm.state || '',
                        postal_code: this.subscriptionForm.postal_code || '',
                        country: this.subscriptionForm.country || '',
                    }
                }

                this.stripe.handleCardSetup(secret, this.subscriptionCardElement, {
                    payment_method_data: {
                        billing_details: payload
                    }
                }).then(response => {
                    if (response.error) {
                        this.errors = [response.error.message];

                        this.processing = false;
                    } else {
                        this.request('POST', '/spark/subscription', {
                            plan: this.subscribing.id,
                            payment_method: response.setupIntent.payment_method,
                            coupon: this.subscriptionForm.coupon,
                            extra_billing_information: this.subscriptionForm.extra,
                            billing_address: this.subscriptionForm.address,
                            billing_address_line_2: this.subscriptionForm.address2,
                            billing_city: this.subscriptionForm.city,
                            billing_state: this.subscriptionForm.state,
                            billing_postal_code: this.subscriptionForm.postal_code,
                            billing_country: this.subscriptionForm.country,
                            vat_id: this.subscriptionForm.vat,
                        }).then(response => {
                            this.billingInformationForm.extra = this.subscriptionForm.extra;

                            if (response && response.data.paymentId) {
                                window.location = '/' + this.$page.props.cashierPath + '/payment/' + response.data.paymentId + '?redirect=' + window.location.origin + '/' + this.$page.props.sparkPath;
                            } else if (response) {
                                this.reloadData();
                            } else {
                                this.processing = false;
                            }
                        });
                    }
                });
            });
        },

        /**
         * Switch to the given plan.
         */
        switchToPlan(plan) {
            this.processing = true;

            this.request('PUT', '/spark/subscription', {
                plan: plan.id,
            }).then(response => {
                this.reloadData();
            });
        },

        /**
         * Toggle the plan intervals that are being displayed.
         */
        toggleDisplayedPlanIntervals() {
            if (this.showingPlansOfInterval == 'monthly') {
                this.showingPlansOfInterval = 'yearly';
            } else {
                this.showingPlansOfInterval = 'monthly';
            }
        },

        /**
         * Show the coupon code entry field.
         */
        showCouponCode() {
            this.showingCouponCode = true;

            this.$nextTick(() => this.$refs.coupon.focus());
        },

        /**
         * Show the VAT number entry field.
         */
        showVatNumber() {
            this.addingVatNumber = true;

            this.$nextTick(() => this.$refs.vat.focus());
        },

        /**
         * Update the customer's payment method.
         */
        updatePaymentMethod() {
            this.processing = true;

            this.generateSetupIntentToken(secret => {
                let payload = {
                    name: this.$page.props.userName
                };

                if (this.subscriptionForm.country) {
                    payload.address = {
                        line1: this.paymentInformationForm.address || '',
                        line2: this.paymentInformationForm.address2 || '',
                        city: this.paymentInformationForm.city || '',
                        state: this.paymentInformationForm.state || '',
                        postal_code: this.paymentInformationForm.postal_code || '',
                        country: this.paymentInformationForm.country || '',
                    }
                }

                this.stripe.handleCardSetup(secret, this.paymentMethodCardElement, {
                    payment_method_data: {
                        billing_details: payload
                    }
                }).then(response => {
                    if (response.error) {
                        this.errors = [response.error.message];

                        this.processing = false;
                    } else {
                        this.request('PUT', '/spark/subscription/payment-method', {
                            payment_method: response.setupIntent.payment_method,
                            billing_address: this.paymentInformationForm.address,
                            billing_address_line_2: this.paymentInformationForm.address2,
                            billing_city: this.paymentInformationForm.city,
                            billing_state: this.paymentInformationForm.state,
                            billing_postal_code: this.paymentInformationForm.postal_code,
                            billing_country: this.paymentInformationForm.country,
                            vat_id: this.paymentInformationForm.vat,
                        }).then(response => {
                            if (response) {
                                this.reloadData();

                                this.paymentMethodCardElement.clear();

                                this.$refs.updatePaymentMethodButton.$el.setAttribute('disabled', 'disabled')
                            } else {
                                this.processing = false;
                            }
                        });
                    }
                });
            });
        },

        /**
         * Generate a Stripe Setup Intent token.
         */
        generateSetupIntentToken(callback) {
            return this.request('GET', '/spark/token').then(
                response => callback(response.data.clientSecret)
            );
        },

        /**
         * Update the extra billing information for the customer.
         */
        updateBillingInformation() {
            this.processing = true;

            this.request('PUT', '/spark/billing-information', {
                extra_billing_information: this.billingInformationForm.extra,
            }).then(response => {
                this.subscriptionForm.extra = this.billingInformationForm.extra;

                this.reloadData();
            });
        },

        /**
         * Update the email addresses we send receipts to.
         */
        updateReceiptEmails() {
            this.processing = true;

            this.request('PUT', '/spark/receipt-emails', {
                receipt_emails: this.receiptEmailsForm.receipt_emails,
            }).then(response => {
                this.reloadData();
            });
        },

        /**
         * Apply a coupon to the existing subscription.
         */
        applyCoupon() {
            this.processing = true;

            this.request('PUT', '/spark/coupon', {
                coupon: this.couponForm.coupon,
            }).then(response => {
                this.reloadData();
            });
        },

        /**
         * Cancel the customer's subscription.
         */
        cancelSubscription() {
            this.processing = true;

            this.request('PUT', '/spark/subscription/cancel').then(response => {
                this.reloadData();
            });
        },

        /**
         * Resume a cancelled subscription.
         */
        resumeSubscription() {
            this.processing = true;

            this.request('PUT', '/spark/subscription/resume', {}).then(response => {
                this.reloadData();
            });
        },

        /**
         * Calculate the appropriate TAX for the given total.
         */
        calculatingTax(plan, callback) {
            this.loadingTaxCalculations = true;

            return this.request('POST', '/spark/tax-rate', {
                total: plan.raw_price,
                currency: plan.currency,
                vat_number: this.subscriptionForm.vat,
                country: this.subscriptionForm.country,
                postal_code: this.subscriptionForm.postal_code,
            }).then(response => {
                this.loadingTaxCalculations = false;

                callback(response.data)
            });
        },

        /**
         * Start periodically reloading the page's data.
         */
        startReloadingData() {
            setTimeout(() => {
                this.reloadData();
            }, 1000)
        },

        /**
         * Reload the page's data, while maintaining any current state.
         */
        reloadData() {
            return this.$inertia.reload({
                onSuccess: () => {
                    this.selectingNewPlan = false;
                    this.processing = false;
                    this.subscribing = null;
                    this.updatingPaymentMethod = false;
                }
            });
        },

        /**
         * Make an outgoing request to the Laravel application.
         */
        request(method, url, data = {}) {
            this.errors = [];

            data.billableType = this.billableType;
            data.billableId = this.billableId;

            return axios.request({
                url: url,
                method: method,
                data: data,
            }).then(response => {
                return response;
            }).catch(error => {
                if (error.response.status == 422) {
                    this.errors = _.flatMap(error.response.data.errors)
                } else {
                    this.errors = [this.__('An unexpected error occurred and we have notified our support team. Please try again later.')]
                }

                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            });
        },
    },
}
</script>
