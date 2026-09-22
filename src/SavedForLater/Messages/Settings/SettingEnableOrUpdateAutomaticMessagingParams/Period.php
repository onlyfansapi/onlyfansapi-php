<?php

declare(strict_types=1);

namespace OnlyFansAPI\SavedForLater\Messages\Settings\SettingEnableOrUpdateAutomaticMessagingParams;

/**
 * The automatic messaging interval (in hours).
 */
enum Period: int
{
    case _6 = 6;

    case _12 = 12;

    case _24 = 24;

    case _48 = 48;
}
