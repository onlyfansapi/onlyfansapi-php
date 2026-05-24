<?php

declare(strict_types=1);

namespace Onlyfansapi\Statistics;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Statistics\StatisticGetOverviewParams\Type;

/**
 * Get an overview of statistics for fans, visitors, posts, or general.
 *
 * @see Onlyfansapi\Services\StatisticsService::getOverview()
 *
 * @phpstan-type StatisticGetOverviewParamsShape = array{
 *   endDate: string, startDate: string, type?: null|Type|value-of<Type>
 * }
 */
final class StatisticGetOverviewParams implements BaseModel
{
    /** @use SdkModel<StatisticGetOverviewParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The end date for the statistics.
     */
    #[Required]
    public string $endDate;

    /**
     * The start date for the statistics.
     */
    #[Required]
    public string $startDate;

    /**
     * The type of statistics to retrieve (default = empty).
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class, nullable: true)]
    public ?string $type;

    /**
     * `new StatisticGetOverviewParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * StatisticGetOverviewParams::with(endDate: ..., startDate: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new StatisticGetOverviewParams)->withEndDate(...)->withStartDate(...)
     * ```
     */
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
        string $endDate,
        string $startDate,
        Type|string|null $type = null
    ): self {
        $self = new self;

        $self['endDate'] = $endDate;
        $self['startDate'] = $startDate;

        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * The end date for the statistics.
     */
    public function withEndDate(string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * The start date for the statistics.
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
