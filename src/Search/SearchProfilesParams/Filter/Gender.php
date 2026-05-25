<?php

declare(strict_types=1);

namespace OnlyFansAPI\Search\SearchProfilesParams\Filter;

/**
 * Filter by gender (available: `female`, `male`, `trans`, `trans_ftm` (Female-to-Male), `trans_mft` (Male-to-Female), `couple`). ⭐️ Only available on the Pro and Enterprise plan.
 */
enum Gender: string
{
    case FEMALE = 'female';

    case MALE = 'male';

    case TRANS = 'trans';

    case TRANS_FTM = 'trans_ftm';

    case TRANS_MTF = 'trans_mtf';

    case COUPLE = 'couple';
}
