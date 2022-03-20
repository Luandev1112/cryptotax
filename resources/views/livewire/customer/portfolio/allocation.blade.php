<div>
    <p class=" text-xl md:text-2xl font-bold">Portfolio Allocation</p>
    <div class="pt-5 flex-1 xl:h-90 lg:h-60 md:h-60 h-98">
        <div class="" id="doghnut-chart"></div>
    </div>
</div>
@push('scripts')
<script>
    (function () {
        var options = {
            chart: {
                type: 'donut'
            },
            series: [44, 55, 13, 33],
            labels: ['Bitcoin', 'Ethereum', 'Ripple', 'Litecoin'],
            legend: {
                show: true,
                position: 'bottom'
            }
            
        }
        const chart = new ApexCharts(document.getElementById(`doghnut-chart`), options);
        chart.render();
    }());
</script>
@endpush