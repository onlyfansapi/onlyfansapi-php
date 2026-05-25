<?php

declare(strict_types=1);

namespace OnlyFansAPI\Analytics\Financial\Profitability;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type ProfitabilityGetHistoryResponseItemShape = array{
 *   grossRevenue?: float|null,
 *   margin?: float|null,
 *   month?: int|null,
 *   netRevenue?: float|null,
 *   profit?: float|null,
 *   year?: int|null,
 * }
 */
final class ProfitabilityGetHistoryResponseItem implements BaseModel
{
    /** @use SdkModel<ProfitabilityGetHistoryResponseItemShape> */
    use SdkModel;

    #[Optional('gross_revenue')]
    public ?float $grossRevenue;

    #[Optional]
    public ?float $margin;

    #[Optional]
    public ?int $month;

    #[Optional('net_revenue')]
    public ?float $netRevenue;

    #[Optional]
    public ?float $profit;

    #[Optional]
    public ?int $year;

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
        ?float $grossRevenue = null,
        ?float $margin = null,
        ?int $month = null,
        ?float $netRevenue = null,
        ?float $profit = null,
        ?int $year = null,
    ): self {
        $self = new self;

        null !== $grossRevenue && $self['grossRevenue'] = $grossRevenue;
        null !== $margin && $self['margin'] = $margin;
        null !== $month && $self['month'] = $month;
        null !== $netRevenue && $self['netRevenue'] = $netRevenue;
        null !== $profit && $self['profit'] = $profit;
        null !== $year && $self['year'] = $year;

        return $self;
    }

    public function withGrossRevenue(float $grossRevenue): self
    {
        $self = clone $this;
        $self['grossRevenue'] = $grossRevenue;

        return $self;
    }

    public function withMargin(float $margin): self
    {
        $self = clone $this;
        $self['margin'] = $margin;

        return $self;
    }

    public function withMonth(int $month): self
    {
        $self = clone $this;
        $self['month'] = $month;

        return $self;
    }

    public function withNetRevenue(float $netRevenue): self
    {
        $self = clone $this;
        $self['netRevenue'] = $netRevenue;

        return $self;
    }

    public function withProfit(float $profit): self
    {
        $self = clone $this;
        $self['profit'] = $profit;

        return $self;
    }

    public function withYear(int $year): self
    {
        $self = clone $this;
        $self['year'] = $year;

        return $self;
    }
}
