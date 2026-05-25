<?php

declare(strict_types=1);

namespace OnlyFansAPI\Core\Conversion;

use OnlyFansAPI\Core\Conversion\Concerns\ArrayOf;
use OnlyFansAPI\Core\Conversion\Contracts\Converter;

/**
 * @internal
 */
final class MapOf implements Converter
{
    use ArrayOf;
}
