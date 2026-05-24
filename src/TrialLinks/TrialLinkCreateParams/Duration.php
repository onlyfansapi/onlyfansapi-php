<?php

declare(strict_types=1);

namespace Onlyfansapi\TrialLinks\TrialLinkCreateParams;

/**
 * The duration of the free trial **in days**. Must be **1**, **3**, **7**, **14**, **30** (1 month), **90** (3 months), **180** (6 months), or **360** (12 months).
 */
enum Duration: int
{
    case _1 = 1;

    case _3 = 3;

    case _7 = 7;

    case _14 = 14;

    case _30 = 30;

    case _90 = 90;

    case _180 = 180;

    case _360 = 360;
}
