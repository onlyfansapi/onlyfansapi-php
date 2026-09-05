<?php

declare(strict_types=1);

namespace OnlyFansAPI\Stories\StoryCreateParams\Text;

/**
 * Font weight; must match the chosen family (see `fontFamily`).
 */
enum FontWeight: int
{
    case _400 = 400;

    case _500 = 500;

    case _700 = 700;
}
