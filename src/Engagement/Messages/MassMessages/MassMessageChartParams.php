<?php

declare(strict_types=1);

namespace OnlyFansAPI\Engagement\Messages\MassMessages;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Get engagement chart metrics for mass messages: sent count and purchase amount over time.
 *
 * @see OnlyFansAPI\Services\Engagement\Messages\MassMessagesService::chart()
 *
 * @phpstan-type MassMessageChartParamsShape = array{
 *   endDate?: string|null, startDate?: string|null, withTotal?: bool|null
 * }
 */
final class MassMessageChartParams implements BaseModel
{
    /** @use SdkModel<MassMessageChartParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * End of the chart window in `Y-m-d H:i:s` format. It must be after `startDate`.
     */
    #[Optional]
    public ?string $endDate;

    /**
     * Start of the chart window in `Y-m-d H:i:s` format.
     */
    #[Optional]
    public ?string $startDate;

    /**
     * Include `total` and `delta` aggregates in the response. Defaults to `true`.
     */
    #[Optional]
    public ?bool $withTotal;

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
        ?string $startDate = null,
        ?bool $withTotal = null
    ): self {
        $self = new self;

        null !== $endDate && $self['endDate'] = $endDate;
        null !== $startDate && $self['startDate'] = $startDate;
        null !== $withTotal && $self['withTotal'] = $withTotal;

        return $self;
    }

    /**
     * End of the chart window in `Y-m-d H:i:s` format. It must be after `startDate`.
     */
    public function withEndDate(string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * Start of the chart window in `Y-m-d H:i:s` format.
     */
    public function withStartDate(string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }

    /**
     * Include `total` and `delta` aggregates in the response. Defaults to `true`.
     */
    public function withWithTotal(bool $withTotal): self
    {
        $self = clone $this;
        $self['withTotal'] = $withTotal;

        return $self;
    }
}
