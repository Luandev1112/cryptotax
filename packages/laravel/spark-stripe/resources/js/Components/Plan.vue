<template>
    <div>
        <div class="flex justify-between">
            <h2 class="px-6 pt-4 text-xl font-semibold text-gray-700">
                {{ plan.name }}
            </h2>

            <div class="h-1/2 px-4 py-1 bg-gray-200 text-gray-700 text-sm font-semibold rounded-bl-md"
                        v-if="! hideIncentive && ((plan.incentive.monthly && plan.interval == 'monthly') ||
                              (plan.incentive.yearly && plan.interval == 'yearly'))">
                {{ plan.incentive[plan.interval] }}
            </div>
        </div>

        <div class="px-6 pb-4">
            <div class="mt-2 text-md font-semibold text-gray-700">
                <span v-html="plan.price"></span>
                <span v-if="$page.props.collectsVat">({{ __('ex VAT') }})</span>
                <template v-if="seatName"> / {{ seatName }} / {{ __(plan.interval) }}</template>
                <template v-else>/ {{ __(plan.interval) }}</template>
                <span class="text-gray-400" v-if="plan.trial_days">({{ __(':days day trial', {days: plan.trial_days })}})</span>
            </div>

            <div class="mt-3 max-w-xl text-sm text-gray-600">
                {{ plan.short_description }}
            </div>

            <div class="mt-3 space-y-2">
                <div class="flex items-center" v-for="feature in plan.features">
                    <svg viewBox="0 0 20 20" fill="currentColor" class="text-green-400 opacity-75 w-5 h-5">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>

                    <div class="ml-2 text-sm text-gray-600">
                        {{ feature }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import FormatsValues from './../Mixins/FormatsValues';

    export default {
        mixins: [FormatsValues],

        props: ['plan', 'seatName', 'hideIncentive']
    }
</script>
