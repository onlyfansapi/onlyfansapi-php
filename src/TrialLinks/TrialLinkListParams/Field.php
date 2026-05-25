<?php

declare(strict_types=1);

namespace OnlyFansAPI\TrialLinks\TrialLinkListParams;

/**
 * Sort the results by a field. Default `create_date`.
 */
enum Field: string
{
    case CREATE_DATE = 'create_date';

    case EXPIRE_DATE = 'expire_date';

    case SUBSCRIBE_COUNTS = 'subscribe_counts';

    case SUBSCRIBE_DAYS = 'subscribe_days';

    case CLAIMS_COUNT = 'claims_count';
}
