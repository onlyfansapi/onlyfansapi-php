<?php

declare(strict_types=1);

namespace OnlyFansAPI\Statistics\Reach;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Statistics\Reach\ReachGetProfileVisitorsParams\Filter;
use OnlyFansAPI\Statistics\Reach\ReachGetProfileVisitorsParams\Type;

/**
 * Get the number of profile visitors for a given period.
 *
 * @see OnlyFansAPI\Services\Statistics\ReachService::getProfileVisitors()
 *
 * @phpstan-type ReachGetProfileVisitorsParamsShape = array{
 *   endDate: string,
 *   startDate: string,
 *   filter?: null|Filter|value-of<Filter>,
 *   limit?: int|null,
 *   type?: null|Type|value-of<Type>,
 * }
 */
final class ReachGetProfileVisitorsParams implements BaseModel
{
    /** @use SdkModel<ReachGetProfileVisitorsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The end date for the period.
     */
    #[Required]
    public string $endDate;

    /**
     * The start date for the period.
     */
    #[Required]
    public string $startDate;

    /**
     * Optionally, filter the results by `chart` or `topCountries`. See example responses.
     *
     * @var value-of<Filter>|null $filter
     */
    #[Optional(enum: Filter::class, nullable: true)]
    public ?string $filter;

    /**
     * Number of results to return.
     */
    #[Optional(nullable: true)]
    public ?int $limit;

    /**
     * Filter all / users / guests.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class, nullable: true)]
    public ?string $type;

    /**
     * `new ReachGetProfileVisitorsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ReachGetProfileVisitorsParams::with(endDate: ..., startDate: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ReachGetProfileVisitorsParams)->withEndDate(...)->withStartDate(...)
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
     * @param Filter|value-of<Filter>|null $filter
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        string $endDate,
        string $startDate,
        Filter|string|null $filter = null,
        ?int $limit = null,
        Type|string|null $type = null,
    ): self {
        $self = new self;

        $self['endDate'] = $endDate;
        $self['startDate'] = $startDate;

        null !== $filter && $self['filter'] = $filter;
        null !== $limit && $self['limit'] = $limit;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * The end date for the period.
     */
    public function withEndDate(string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * The start date for the period.
     */
    public function withStartDate(string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }

    /**
     * Optionally, filter the results by `chart` or `topCountries`. See example responses.
     *
     * @param Filter|value-of<Filter>|null $filter
     */
    public function withFilter(Filter|string|null $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }

    /**
     * Number of results to return.
     */
    public function withLimit(?int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Filter all / users / guests.
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
