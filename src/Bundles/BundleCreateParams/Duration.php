<?php

declare(strict_types=1);

namespace Onlyfansapi\Bundles\BundleCreateParams;

/**
 * The bundle's duration in months.
 */
enum Duration: int
{
    case _3 = 3;

    case _6 = 6;

    case _12 = 12;
}
