export default {
    methods: {
        /**
         * Format the given date string.
         */
        formatDate(date) {
            return moment(date).local().format('MMMM Do, YYYY');
        },
    }
}
