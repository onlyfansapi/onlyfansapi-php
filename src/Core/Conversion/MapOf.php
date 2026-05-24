<?php

declare(strict_types=1);

namespace Onlyfansapi\Core\Conversion;

use Onlyfansapi\Core\Conversion\Concerns\ArrayOf;
use Onlyfansapi\Core\Conversion\Contracts\Converter;

/**
 * @internal
 */
final class MapOf implements Converter
{
    use ArrayOf;
}
