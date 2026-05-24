<?php

declare(strict_types=1);

namespace Onlyfansapi\Core\Conversion\Contracts;

use Onlyfansapi\Core\Conversion\CoerceState;
use Onlyfansapi\Core\Conversion\DumpState;

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
