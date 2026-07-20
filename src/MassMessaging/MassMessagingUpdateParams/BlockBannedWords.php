<?php

declare(strict_types=1);

namespace OnlyFansAPI\MassMessaging\MassMessagingUpdateParams;

/**
 * Screen `text` for OnlyFans banned words and block the update if any are found (returns a 422 listing the offending words). `strict_ban` blocks all tiers, `risky` blocks Risky + Replace/soften, `replace_soften` blocks Replace/soften only. Omit to disable screening.
 */
enum BlockBannedWords: string
{
    case STRICT_BAN = 'strict_ban';

    case RISKY = 'risky';

    case REPLACE_SOFTEN = 'replace_soften';
}
