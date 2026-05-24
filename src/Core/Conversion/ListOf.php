<?php

declare(strict_types=1);

namespace Onlyfansapi\Core\Conversion;

use Onlyfansapi\Core\Conversion\Concerns\ArrayOf;
use Onlyfansapi\Core\Conversion\Contracts\Converter;

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
