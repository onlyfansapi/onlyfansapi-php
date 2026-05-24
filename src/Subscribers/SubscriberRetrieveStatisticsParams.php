<?php

declare(strict_types=1);

namespace Onlyfansapi\Subscribers;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Subscribers\SubscriberRetrieveStatisticsParams\Type;

/**
 * Get subscriber and earning statistics for an account for a specified timeframe. Optionally, filter by all, renews, or new subscribers.
 *
 * @see Onlyfansapi\Services\SubscribersService::retrieveStatistics()
 *
 * @phpstan-type SubscriberRetrieveStatisticsParamsShape = array{
 *   endDate?: string|null,
 *   startDate?: string|null,
 *   type?: null|Type|value-of<Type>,
 * }
 */
final class SubscriberRetrieveStatisticsParams implements BaseModel
{
    /** @use SdkModel<SubscriberRetrieveStatisticsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The end date for the period. Keep empty to calculate everything.
     */
    #[Optional(nullable: true)]
    public ?string $endDate;

    /**
     * The start date for the period. Keep empty to calculate everything.
     */
    #[Optional(nullable: true)]
    public ?string $startDate;

    /**
     * Filter the subscriber statistics (default = total).
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class, nullable: true)]
    public ?string $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        ?string $endDate = null,
        ?string $startDate = null,
        Type|string|null $type = null,
    ): self {
        $self = new self;

        null !== $endDate && $self['endDate'] = $endDate;
        null !== $startDate && $self['startDate'] = $startDate;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * The end date for the period. Keep empty to calculate everything.
     */
    public function withEndDate(?string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * The start date for the period. Keep empty to calculate everything.
     */
    public function withStartDate(?string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }

    /**
     * Filter the subscriber statistics (default = total).
     *
     * @param Type|value-of<Type>|null $type
     */
    public function withType(Type|string|null $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
