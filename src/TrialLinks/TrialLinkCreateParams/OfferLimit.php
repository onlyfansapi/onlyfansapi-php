<?php

declare(strict_types=1);

namespace OnlyFansAPI\TrialLinks\TrialLinkCreateParams;

/**
 * How many people can use this offer. Must either be **0** (for no limit), or a number between **1**-**10**, **50**, or **100**.
 */
enum OfferLimit: int
{
    case _0 = 0;

    case _1 = 1;

    case _2 = 2;

    case _3 = 3;

    case _4 = 4;

    case _5 = 5;

    case _6 = 6;

    case _7 = 7;

    case _8 = 8;

    case _9 = 9;

    case _10 = 10;

    case _50 = 50;

    case _100 = 100;
}
