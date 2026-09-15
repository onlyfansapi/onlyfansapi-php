<?php

declare(strict_types=1);

namespace OnlyFansAPI\Stories\StoryCreateParams\Text;

/**
 * Font family. Families support specific weights only: Roboto (400/500/700), PTMono (400), ShantellSans (400), SofiaSans (400, renders uppercase), YanoneKaffeesatz (700), RubikMedium (500), RubikBlack (700). Default `Roboto`. Ignored for mentions (always Roboto 500).
 */
enum FontFamily: string
{
    case ROBOTO = 'Roboto';

    case PT_MONO = 'PTMono';

    case SHANTELL_SANS = 'ShantellSans';

    case SOFIA_SANS = 'SofiaSans';

    case YANONE_KAFFEESATZ = 'YanoneKaffeesatz';

    case RUBIK_MEDIUM = 'RubikMedium';

    case RUBIK_BLACK = 'RubikBlack';
}
