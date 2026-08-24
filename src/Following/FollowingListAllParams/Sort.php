<?php

declare(strict_types=1);

namespace OnlyFansAPI\Following\FollowingListAllParams;

/**
 * Order the list by `last_activity` (the followed creator's last activity), `expire_date` (subscription expiry), `subscribe_date` (subscription start) or `is_expired` (expired first — OnlyFans only offers this one on the expired list). Omit it to keep whichever order is currently stored for the account. **Note:** OnlyFans persists this order account-wide, so it also applies to later requests that omit `sort` and to the creator's own onlyfans.com UI, until it is changed again. This field is required when <code>sortDirection</code> is present.
 */
enum Sort: string
{
    case LAST_ACTIVITY = 'last_activity';

    case EXPIRE_DATE = 'expire_date';

    case SUBSCRIBE_DATE = 'subscribe_date';

    case IS_EXPIRED = 'is_expired';
}
