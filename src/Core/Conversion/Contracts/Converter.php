<?php

declare(strict_types=1);

namespace OnlyFansAPI\Core\Conversion\Contracts;

use OnlyFansAPI\Core\Conversion\CoerceState;
use OnlyFansAPI\Core\Conversion\DumpState;

/**
 * @internal
 */
interface Converter
{
    /**
     * @internal
     */
    public function coerce(mixed $value, CoerceState $state): mixed;

    /**
     * @internal
     */
    public function dump(mixed $value, DumpState $state): mixed;
}
