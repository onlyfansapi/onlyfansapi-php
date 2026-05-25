<?php

declare(strict_types=1);

namespace OnlyFansAPI\SmartLinks\SmartLinkListConversionsResponse\Data;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type SummaryShape = array{
 *   conversionsTotal?: int|null,
 *   revenueTotal?: float|null,
 *   subscribersTotal?: int|null,
 * }
 */
final class Summary implements BaseModel
{
    /** @use SdkModel<SummaryShape> */
    use SdkModel;

    #[Optional('conversions_total')]
    public ?int $conversionsTotal;

    #[Optional('revenue_total')]
    public ?float $revenueTotal;

    #[Optional('subscribers_total')]
    public ?int $subscribersTotal;

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
        ?int $conversionsTotal = null,
        ?float $revenueTotal = null,
        ?int $subscribersTotal = null,
    ): self {
        $self = new self;

        null !== $conversionsTotal && $self['conversionsTotal'] = $conversionsTotal;
        null !== $revenueTotal && $self['revenueTotal'] = $revenueTotal;
        null !== $subscribersTotal && $self['subscribersTotal'] = $subscribersTotal;

        return $self;
    }

    public function withConversionsTotal(int $conversionsTotal): self
    {
        $self = clone $this;
        $self['conversionsTotal'] = $conversionsTotal;

        return $self;
    }

    public function withRevenueTotal(float $revenueTotal): self
    {
        $self = clone $this;
        $self['revenueTotal'] = $revenueTotal;

        return $self;
    }

    public function withSubscribersTotal(int $subscribersTotal): self
    {
        $self = clone $this;
        $self['subscribersTotal'] = $subscribersTotal;

        return $self;
    }
}
