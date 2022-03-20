<?php

namespace Spark\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\HtmlString;

class DownloadReceiptController
{
    use RetrievesBillableModels;

    /**
     * Download the given receipt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $type
     * @param  string  $id
     * @param  string  $receiptId
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function __invoke(Request $request, $type, $id, $receiptId)
    {
        $billable = $this->billable($type, $id);

        $receipt = $billable->localReceipts()->where('provider_id', $receiptId)->firstOrFail();

        $receiptData = array_merge([
            'vendor' => 'Laravel',
            'product' => '',
            'street' => '',
            'location' => '',
            'vat' => new HtmlString(nl2br(e($billable->extra_billing_information))),
        ], config('spark.receipt_data'));

        return $billable->downloadInvoice(
            $receipt->provider_id,
            $receiptData
        );
    }
}
