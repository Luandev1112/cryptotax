<?php

namespace Spark\Events;

class SubscriptionUpdated
{
    /**
     * The billable instance.
     *
     * @var \Spark\Billable
     */
    public $billable;

    /**
     * Create a new event instance.
     *
     * @param \Spark\Billable $billable
     * @return void
     */
    public function __construct($billable)
    {
        $this->billable = $billable;
    }
}
