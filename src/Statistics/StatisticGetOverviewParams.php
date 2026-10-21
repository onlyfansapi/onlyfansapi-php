<?php

declare(strict_types=1);

namespace OnlyFansAPI\Statistics;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Statistics\StatisticGetOverviewParams\Type;

/**
 * Get an overview of statistics for fans, visitors, posts, or general.
 *
 * @see OnlyFansAPI\Services\StatisticsService::getOverview()
 *
 * @phpstan-type StatisticGetOverviewParamsShape = array{
 *   endDate?: string|null,
 *   startDate?: string|null,
 *   type?: null|Type|value-of<Type>,
 * }
 */
final class StatisticGetOverviewParams implements BaseModel
{
    /** @use SdkModel<StatisticGetOverviewParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The end date for the statistics. Keep empty to retrieve until now.
     */
    #[Optional]
    public ?string $endDate;

    /**
     * The start date for the statistics. Keep empty to retrieve from the model's start date.
     */
    #[Optional]
    public ?string $startDate;

    /**
     * The type of statistics to retrieve (default = empty).
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
     * The end date for the statistics. Keep empty to retrieve until now.
     */
    public function withEndDate(string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * The start date for the statistics. Keep empty to retrieve from the model's start date.
     */
    public function withStartDate(string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }

    /**
     * The type of statistics to retrieve (default = empty).
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
