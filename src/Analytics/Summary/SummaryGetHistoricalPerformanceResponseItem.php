<?php

declare(strict_types=1);

namespace Onlyfansapi\Analytics\Summary;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type SummaryGetHistoricalPerformanceResponseItemShape = array{
 *   period?: string|null, value?: float|null
 * }
 */
final class SummaryGetHistoricalPerformanceResponseItem implements BaseModel
{
    /** @use SdkModel<SummaryGetHistoricalPerformanceResponseItemShape> */
    use SdkModel;

    #[Optional]
    public ?string $period;

    #[Optional]
    public ?float $value;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $period = null,
        ?float $value = null
    ): self {
        $self = new self;

        null !== $period && $self['period'] = $period;
        null !== $value && $self['value'] = $value;

        return $self;
    }

    public function withPeriod(string $period): self
    {
        $self = clone $this;
        $self['period'] = $period;

        return $self;
    }

    public function withValue(float $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
