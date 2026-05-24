<?php

declare(strict_types=1);

namespace Onlyfansapi\Analytics\Summary\SummaryGetPeriodComparisonResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type SummaryShape = array{
 *   change?: float|null,
 *   changePercentage?: float|null,
 *   periodATotal?: float|null,
 *   periodBTotal?: float|null,
 * }
 */
final class Summary implements BaseModel
{
    /** @use SdkModel<SummaryShape> */
    use SdkModel;

    #[Optional]
    public ?float $change;

    #[Optional('change_percentage')]
    public ?float $changePercentage;

    #[Optional('period_a_total')]
    public ?float $periodATotal;

    #[Optional('period_b_total')]
    public ?float $periodBTotal;

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
        ?float $change = null,
        ?float $changePercentage = null,
        ?float $periodATotal = null,
        ?float $periodBTotal = null,
    ): self {
        $self = new self;

        null !== $change && $self['change'] = $change;
        null !== $changePercentage && $self['changePercentage'] = $changePercentage;
        null !== $periodATotal && $self['periodATotal'] = $periodATotal;
        null !== $periodBTotal && $self['periodBTotal'] = $periodBTotal;

        return $self;
    }

    public function withChange(float $change): self
    {
        $self = clone $this;
        $self['change'] = $change;

        return $self;
    }

    public function withChangePercentage(float $changePercentage): self
    {
        $self = clone $this;
        $self['changePercentage'] = $changePercentage;

        return $self;
    }

    public function withPeriodATotal(float $periodATotal): self
    {
        $self = clone $this;
        $self['periodATotal'] = $periodATotal;

        return $self;
    }

    public function withPeriodBTotal(float $periodBTotal): self
    {
        $self = clone $this;
        $self['periodBTotal'] = $periodBTotal;

        return $self;
    }
}
