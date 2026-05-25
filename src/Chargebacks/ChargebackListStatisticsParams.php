<?php

declare(strict_types=1);

namespace OnlyFansAPI\Chargebacks;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * List chargeback counts & amounts per hour, day or month.
 *
 * @see OnlyFansAPI\Services\ChargebacksService::listStatistics()
 *
 * @phpstan-type ChargebackListStatisticsParamsShape = array{
 *   endDate?: string|null, startDate?: string|null
 * }
 */
final class ChargebackListStatisticsParams implements BaseModel
{
    /** @use SdkModel<ChargebackListStatisticsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The end date for the chargebacks. Keep empty to get all.
     */
    #[Optional]
    public ?string $endDate;

    /**
     * The start date for the chargebacks. Keep empty to get all.
     */
    #[Optional]
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
     * The end date for the chargebacks. Keep empty to get all.
     */
    public function withEndDate(string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * The start date for the chargebacks. Keep empty to get all.
     */
    public function withStartDate(string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }
}
