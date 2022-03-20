<template>
    <div>
        <div class="bg-white sm:rounded-lg shadow-sm divide-y divide-gray-100">
            <div class="flex items-center px-6 py-4" v-for="receipt in receipts">
                <div class="text-sm  w-40">
                    {{ formatDate(receipt.paid_at) }}
                </div>

                <div class="ml-10 text-sm w-40">
                    <span v-html="receipt.amount"></span>
                </div>

                <div class="ml-10">
                    <a class="underline text-sm text-gray-500"
                       :href="receipt.receipt_url" target="_blank">{{__('Download Receipt')}}</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import FormatsValues from './../Mixins/FormatsValues';

    export default {
        mixins: [FormatsValues],

        props: ['receipts'],
    }
</script>
