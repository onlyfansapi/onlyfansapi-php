<?php

declare(strict_types=1);

namespace OnlyFansAPI\DataExports\DataExportCreateParams;

/**
 * The output file format. Supported formats vary by export type: `csv` or `xlsx` for transactions, chat_messages, fansly_chat_messages, trial_links, tracking_links, smart_links, payouts, chargebacks, public_profiles, fans, followings, profile_visitors; `zip` for media_vault.
 */
enum FileType: string
{
    case CSV = 'csv';

    case XLSX = 'xlsx';

    case ZIP = 'zip';
}
