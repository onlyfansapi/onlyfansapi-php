<?php

declare(strict_types=1);

namespace OnlyFansAPI\Core\Conversion;

use OnlyFansAPI\Core\Conversion\Concerns\ArrayOf;
use OnlyFansAPI\Core\Conversion\Contracts\Converter;

/**
 * @internal
 */
final class ListOf implements Converter
{
    use ArrayOf;

    // @phpstan-ignore-next-line missingType.iterableValue
    private function empty(): array|object
    {
        return [];
    }
}
