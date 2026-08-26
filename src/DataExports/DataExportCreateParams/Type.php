<?php

declare(strict_types=1);

namespace OnlyFansAPI\DataExports\DataExportCreateParams;

/**
 * The type of data to export. Use `fansly_chat_messages` to export Fansly chat messages (all other types are OnlyFans). `profile_visitors` returns one row per account per day, scraped one day at a time so the daily numbers are not aggregated away by OnlyFans.
 */
enum Type: string
{
    case TRANSACTIONS = 'transactions';

    case CHAT_MESSAGES = 'chat_messages';

    case MEDIA_VAULT = 'media_vault';

    case TRIAL_LINKS = 'trial_links';

    case TRACKING_LINKS = 'tracking_links';

    case SMART_LINKS = 'smart_links';

    case PAYOUTS = 'payouts';

    case CHARGEBACKS = 'chargebacks';

    case PUBLIC_PROFILES = 'public_profiles';

    case FANS = 'fans';

    case FOLLOWINGS = 'followings';

    case PROFILE_VISITORS = 'profile_visitors';

    case FANSLY_CHAT_MESSAGES = 'fansly_chat_messages';
}
