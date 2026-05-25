<?php

declare(strict_types=1);

namespace OnlyFansAPI\Payouts;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Get total and monthly time-series earning statistics for the account.
 *
 * @see OnlyFansAPI\Services\PayoutsService::retrieveEarningStatistics()
 *
 * @phpstan-type PayoutRetrieveEarningStatisticsParamsShape = array{
 *   endDate?: string|null, startDate?: string|null
 * }
 */
final class PayoutRetrieveEarningStatisticsParams implements BaseModel
{
    /** @use SdkModel<PayoutRetrieveEarningStatisticsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The end date for earning statistics. Keep empty to get all earnings.
     */
    #[Optional(nullable: true)]
    public ?string $endDate;

    /**
     * The start date for earning statistics. Keep empty to get all earnings.
     */
    #[Optional(nullable: true)]
    public ?string $startDate;

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
        ?string $endDate = null,
        ?string $startDate = null
    ): self {
        $self = new self;

        null !== $endDate && $self['endDate'] = $endDate;
        null !== $startDate && $self['startDate'] = $startDate;

        return $self;
    }

    /**
     * The end date for earning statistics. Keep empty to get all earnings.
     */
    public function withEndDate(?string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * The start date for earning statistics. Keep empty to get all earnings.
     */
    public function withStartDate(?string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }
}
