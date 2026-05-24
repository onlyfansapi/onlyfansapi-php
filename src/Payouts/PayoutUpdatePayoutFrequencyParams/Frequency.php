<?php

declare(strict_types=1);

namespace Onlyfansapi\Payouts\PayoutUpdatePayoutFrequencyParams;

/**
 * The new payout frequency.
 */
enum Frequency: string
{
    case MANUAL = 'manual';

    case WEEKLY = 'weekly';

    case MONTHLY = 'monthly';
}
