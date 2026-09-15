<?php

declare(strict_types=1);

namespace OnlyFansAPI\Fans;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Fans\FanListTopParams\By;

/**
 * Get a list of top fans sorted by spending. Filterable by total, subscriptions, tips, messages, posts, or streams.
 *
 * @see OnlyFansAPI\Services\FansService::listTop()
 *
 * @phpstan-type FanListTopParamsShape = array{
 *   by?: null|By|value-of<By>, endDate?: string|null, startDate?: string|null
 * }
 */
final class FanListTopParams implements BaseModel
{
    /** @use SdkModel<FanListTopParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Sort by: total (default), subscribes, tips, messages, post, streams.
     *
     * @var value-of<By>|null $by
     */
    #[Optional(enum: By::class, nullable: true)]
    public ?string $by;

    /**
     * End date for filtering (required with start_date). Must be a valid date. Must not be greater than 255 characters.
     */
    #[Optional(nullable: true)]
    public ?string $endDate;

    /**
     * Start date for filtering (required with end_date). Must be a valid date. Must not be greater than 255 characters.
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
     *
     * @param By|value-of<By>|null $by
     */
    public static function with(
        By|string|null $by = null,
        ?string $endDate = null,
        ?string $startDate = null,
    ): self {
        $self = new self;

        null !== $by && $self['by'] = $by;
        null !== $endDate && $self['endDate'] = $endDate;
        null !== $startDate && $self['startDate'] = $startDate;

        return $self;
    }

    /**
     * Sort by: total (default), subscribes, tips, messages, post, streams.
     *
     * @param By|value-of<By>|null $by
     */
    public function withBy(By|string|null $by): self
    {
        $self = clone $this;
        $self['by'] = $by;

        return $self;
    }

    /**
     * End date for filtering (required with start_date). Must be a valid date. Must not be greater than 255 characters.
     */
    public function withEndDate(?string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * Start date for filtering (required with end_date). Must be a valid date. Must not be greater than 255 characters.
     */
    public function withStartDate(?string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }
}
