<div class="py-5 px-3 border rounded-lg">
    {{-- The Master doesn't talk, he acts. --}}
    <div class="p-5 flex items-center justify-between">
        <div>
            <p class="py-2">Total Income</p>
            <div class="flex items-start space-x-2">
                <p class="text-lg font-bold">$</p>
                <h2 class="text-3xl md:text-5xl font-bold">36,806</h2>
            </div>
        </div>
        <div class="flex items-center space-x-2">
            @php
                $buttons = [
                    [ 'name' => '1D' ],
                    [ 'name' => '1W' ],
                    [ 'name' => '1M' ],
                    [ 'name' => '3M' ],
                    [ 'name' => '1Y' ],
                    [ 'name' => 'ALL' ],
                ]
            @endphp
            @foreach ($buttons as $button)                
                <button class="text-primary hover:text-white bg-white hover:bg-primary px-3 py-1 rounded-md">{{ $button['name'] }}</button>
            @endforeach
        </div>
    </div>
    <div class="px-4 h-90">
        <div id="chart"></div>
    </div>
</div>
@push('scripts')
<script>
    (function () {
        var options = {
            chart: {
                height: "100%",
                type: "area",
                stacked: false,
                chartTopMargin: "40",
                toolbar:{
                    show: false
                }
            },
            dataLabels: {
                enabled: false
            },
            colors: ["#796cff", "#a69dff"],
            series: [
                {
                    data: [1.4, 2, 2.5, 1.5, 2.5, 2.8, 3.8, 4.6]
                },
                {
                    data: [2.6, 3.3, 3.8, 2.7, 3.6, 3.9, 5.2, 5.9]
                }
            ],
            stroke: {
                curve: 'smooth',
                dashArray: [0, 8],
                width: 2
            },
            plotOptions: {
                
            },
            fill: {
                type: "gradient",
                colors: ['#796cff', '#eae8fe'],
                opacity:[0.8],
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.7,
                    opacityTo: 0.9,
                    stops: [0, 90, 100]
                }
            },
            xaxis: {
                categories: ["Sep 2019", "Oct 2019", "Nov 2019", "Dec 2019", "Jan 2020", "Feb 2020", "Mar 2020", "Apr 2020"]
            },
            yaxis: {
                axisTicks: {
                    show: true
                },
                axisBorder: {
                    show: true,
                    color: "#cfcfcf"
                },
                labels: {
                        style: {
                        colors: "#cfcfcf"
                    }
                },
            },
            legend: {
                show: false
            }
        };
        const chart = new ApexCharts(document.getElementById(`chart`), options);
        chart.render();
    }());
</script>
@endpush
