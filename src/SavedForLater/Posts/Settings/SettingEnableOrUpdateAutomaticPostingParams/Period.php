<?php

declare(strict_types=1);

namespace Onlyfansapi\SavedForLater\Posts\Settings\SettingEnableOrUpdateAutomaticPostingParams;

/**
 * The automatic posting interval (in hours).
 */
enum Period: int
{
    case _6 = 6;

    case _12 = 12;

    case _24 = 24;

    case _48 = 48;
}
