<?php

declare(strict_types=1);

namespace Onlyfansapi\DataExports\DataExportListParams;

/**
 * Filter by status.
 */
enum Status: string
{
    case CALCULATING_CREDITS = 'calculating_credits';

    case CALCULATING_CREDITS_FAILED = 'calculating_credits_failed';

    case CALCULATING_CREDITS_COMPLETED = 'calculating_credits_completed';

    case PENDING = 'pending';

    case IN_PROGRESS = 'in_progress';

    case COMPLETED = 'completed';

    case FAILED = 'failed';
}
