<?php

declare(strict_types=1);

namespace OnlyFansAPI\Following\FollowingListExpiredParams;

/**
 * Order the list by `last_activity` (the followed creator's last activity), `expire_date` (subscription expiry), `subscribe_date` (subscription start) or `is_expired` (expired first — OnlyFans only offers this one on the expired list). Omit it to keep whichever order is currently stored for the account. **Note:** OnlyFans persists this order account-wide, so it also applies to later requests that omit `sort` and to the creator's own onlyfans.com UI, until it is changed again. **Expired list:** OnlyFans applies `offset` to the whole following collection and only then filters it down to expired subscriptions, so ordering by expiry descending puts the still-active subscriptions first and moves the expired rows to the tail of the collection — the first several hundred offsets then come back empty. Use `sortDirection=asc` or `sort=is_expired` to get expired-first results. For that reason `sort=expire_date` on the expired list defaults to `asc` instead of `desc` when you do not pass `sortDirection`. Whatever order you pick, an empty page is **not** the end of the list: keep following `_pagination.next_page` until it is `null` rather than stopping at the first empty page. This field is required when <code>sortDirection</code> is present.
 */
enum Sort: string
{
    case LAST_ACTIVITY = 'last_activity';

    case EXPIRE_DATE = 'expire_date';

    case SUBSCRIBE_DATE = 'subscribe_date';

    case IS_EXPIRED = 'is_expired';
}
