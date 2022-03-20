<x-app-layout>
    <x-page icon="fas-chart-area" :title="__('Tax-Saving Opportunities')" :border="false">
        <div class="w-full overflow-x-auto mb-6">
            <table class="w-full whitespace-nowrap border-gray-200 border rounded-lg">
                <thead class="bg-gray-100">
                    <tr class="focus:outline-none">
                        <th class="text-left px-6 py-4 rounded-tl-lg">
                            <p>Coin</p>
                        </th>
                        <th class="px-6 py-4">
                            <p class="text-sm text-right">Holdings</p>
                        </th>
                        <th class="text-lef tpx-6 py-4 text-right">
                            <p class="text-sm text-right">Market value</p>
                        </th>
                        <th class="px-6 py-4 text-right">
                            <p class="text-sm text-right">Cost basis</p>
                        </th>
                        <th class="px-6 py-4 text-right">
                            <p class="text-sm text-right">Unrealized gains</p>
                        </th>
                        <th class="px-6 py-4 text-right">
                            <p class="text-sm text-center">Potential savings</p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php($rows = [
                        ["coin" => "btc", "holdings" => 6987.56, "market_value" => 5448.32, "cost_basis" => 25498, "cost_basis_per_unit" => 1.22, "unrealized_gains" => 10568.45, "potential_savings" => 5548.66],
                        ["coin" => "eth", "holdings" => 5473.12, "market_value" => 5448.32, "cost_basis" => 25498, "cost_basis_per_unit" => 1.22, "unrealized_gains" => 10568.45, "potential_savings" => 5548.66],
                        ["coin" => "ada", "holdings" => 52.00, "market_value" => 5448.32, "cost_basis" => 25498, "cost_basis_per_unit" => 1.22, "unrealized_gains" => 10568.45, "potential_savings" => 5548.66],
                        ["coin" => "xrp", "holdings" => 47.57, "market_value" => 5448.32, "cost_basis" => 25498, "cost_basis_per_unit" => 1.22, "unrealized_gains" => 10568.45, "potential_savings" => 5548.66],
                        ["coin" => "ltc", "holdings" => 74255.88, "market_value" => 5448.32, "cost_basis" => 25498, "cost_basis_per_unit" => 1.22, "unrealized_gains" => 10568.45, "potential_savings" => 5548.66],
                    ])
                    @foreach($rows AS $row)
                        <tr class="focus:outline-none text-right">
                            <td class="px-6 py-4 text-left">
                                <x-coin :name="$row['coin']" />
                            </td>
                            <td class="px-6 py-4">
                                {{ moneyFormat($row["holdings"]) }} USD
                            </td>
                            <td class="px-6 py-4">
                                $ {{ moneyFormat($row["market_value"]) }}
                            </td>
                            <td class="px-6 py-4">
                                <p>$ {{ moneyFormat($row["cost_basis"]) }}</p>
                                <p class="text-xs text-gray-500">$ {{ moneyFormat($row["cost_basis_per_unit"]) }} per BTC</p>
                            </td>
                            <td class="px-6 py-4 text-primary-green">
                                +$ {{ moneyFormat($row["unrealized_gains"]) }}
                            </td>
                            <td class="px-6 py-4 text-center font-bold">
                                <x-jet-button class="bg-primary-green">$ {{ moneyFormat($row["potential_savings"]) }} USD</x-jet-button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-page>
</x-app-layout>
