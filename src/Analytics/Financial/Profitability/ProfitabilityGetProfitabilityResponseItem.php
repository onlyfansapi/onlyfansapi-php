<?php

declare(strict_types=1);

namespace Onlyfansapi\Analytics\Financial\Profitability;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type ProfitabilityGetProfitabilityResponseItemShape = array{
 *   commission?: float|null,
 *   creatorID?: int|null,
 *   grossRevenue?: float|null,
 *   margin?: float|null,
 *   name?: string|null,
 *   netRevenue?: float|null,
 *   profit?: float|null,
 *   totalCosts?: float|null,
 * }
 */
final class ProfitabilityGetProfitabilityResponseItem implements BaseModel
{
    /** @use SdkModel<ProfitabilityGetProfitabilityResponseItemShape> */
    use SdkModel;

    #[Optional]
    public ?float $commission;

    #[Optional('creator_id')]
    public ?int $creatorID;

    #[Optional('gross_revenue')]
    public ?float $grossRevenue;

    #[Optional]
    public ?float $margin;

    #[Optional]
    public ?string $name;

    #[Optional('net_revenue')]
    public ?float $netRevenue;

    #[Optional]
    public ?float $profit;

    #[Optional('total_costs')]
    public ?float $totalCosts;

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
        ?float $commission = null,
        ?int $creatorID = null,
        ?float $grossRevenue = null,
        ?float $margin = null,
        ?string $name = null,
        ?float $netRevenue = null,
        ?float $profit = null,
        ?float $totalCosts = null,
    ): self {
        $self = new self;

        null !== $commission && $self['commission'] = $commission;
        null !== $creatorID && $self['creatorID'] = $creatorID;
        null !== $grossRevenue && $self['grossRevenue'] = $grossRevenue;
        null !== $margin && $self['margin'] = $margin;
        null !== $name && $self['name'] = $name;
        null !== $netRevenue && $self['netRevenue'] = $netRevenue;
        null !== $profit && $self['profit'] = $profit;
        null !== $totalCosts && $self['totalCosts'] = $totalCosts;

        return $self;
    }

    public function withCommission(float $commission): self
    {
        $self = clone $this;
        $self['commission'] = $commission;

        return $self;
    }

    public function withCreatorID(int $creatorID): self
    {
        $self = clone $this;
        $self['creatorID'] = $creatorID;

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

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

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

    public function withTotalCosts(float $totalCosts): self
    {
        $self = clone $this;
        $self['totalCosts'] = $totalCosts;

        return $self;
    }
}
