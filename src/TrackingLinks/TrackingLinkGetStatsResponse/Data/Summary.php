<?php

declare(strict_types=1);

namespace OnlyFansAPI\TrackingLinks\TrackingLinkGetStatsResponse\Data;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type SummaryShape = array{
 *   clicksTotal?: int|null,
 *   revenueCachedAt?: string|null,
 *   revenueTotal?: float|null,
 *   spendersTotal?: int|null,
 *   subsTotal?: int|null,
 * }
 */
final class Summary implements BaseModel
{
    /** @use SdkModel<SummaryShape> */
    use SdkModel;

    #[Optional('clicks_total')]
    public ?int $clicksTotal;

    #[Optional('revenue_cached_at')]
    public ?string $revenueCachedAt;

    #[Optional('revenue_total')]
    public ?float $revenueTotal;

    #[Optional('spenders_total')]
    public ?int $spendersTotal;

    #[Optional('subs_total')]
    public ?int $subsTotal;

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
        ?int $clicksTotal = null,
        ?string $revenueCachedAt = null,
        ?float $revenueTotal = null,
        ?int $spendersTotal = null,
        ?int $subsTotal = null,
    ): self {
        $self = new self;

        null !== $clicksTotal && $self['clicksTotal'] = $clicksTotal;
        null !== $revenueCachedAt && $self['revenueCachedAt'] = $revenueCachedAt;
        null !== $revenueTotal && $self['revenueTotal'] = $revenueTotal;
        null !== $spendersTotal && $self['spendersTotal'] = $spendersTotal;
        null !== $subsTotal && $self['subsTotal'] = $subsTotal;

        return $self;
    }

    public function withClicksTotal(int $clicksTotal): self
    {
        $self = clone $this;
        $self['clicksTotal'] = $clicksTotal;

        return $self;
    }

    public function withRevenueCachedAt(string $revenueCachedAt): self
    {
        $self = clone $this;
        $self['revenueCachedAt'] = $revenueCachedAt;

        return $self;
    }

    public function withRevenueTotal(float $revenueTotal): self
    {
        $self = clone $this;
        $self['revenueTotal'] = $revenueTotal;

        return $self;
    }

    public function withSpendersTotal(int $spendersTotal): self
    {
        $self = clone $this;
        $self['spendersTotal'] = $spendersTotal;

        return $self;
    }

    public function withSubsTotal(int $subsTotal): self
    {
        $self = clone $this;
        $self['subsTotal'] = $subsTotal;

        return $self;
    }
}
