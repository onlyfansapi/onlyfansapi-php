<?php

declare(strict_types=1);

namespace OnlyFansAPI\Following;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Following\FollowingListExpiredParams\Filter;

/**
 * Get a paginated list of expired followings for an Account. This list has no order guarantee. Unlike the all and active lists, it is sorted by neither `subscribedByData.subscribeAt` nor `subscribedByData.expiredAt`. To poll for new expirations, page through the full list each cycle (`limit=50`, follow `_pagination.next_page` until it is null) and diff it against your own store using `subscribedByData.expiredAt`. Do NOT stop early at the first entry you have already seen, as that can silently skip real expirations.
 *
 * @see OnlyFansAPI\Services\FollowingService::listExpired()
 *
 * @phpstan-import-type FilterShape from \OnlyFansAPI\Following\FollowingListExpiredParams\Filter
 *
 * @phpstan-type FollowingListExpiredParamsShape = array{
 *   filter?: null|Filter|FilterShape,
 *   limit?: int|null,
 *   offset?: int|null,
 *   query?: string|null,
 * }
 */
final class FollowingListExpiredParams implements BaseModel
{
    /** @use SdkModel<FollowingListExpiredParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?Filter $filter;

    /**
     * Number of followings to return (1-50). Must be at least 1. Must not be greater than 50.
     */
    #[Optional]
    public ?int $limit;

    /**
     * Pagination offset. Must be at least 0.
     */
    #[Optional]
    public ?int $offset;

    /**
     * Search within following name/username.
     */
    #[Optional(nullable: true)]
    public ?string $query;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Filter|FilterShape|null $filter
     */
    public static function with(
        Filter|array|null $filter = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $query = null,
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $limit && $self['limit'] = $limit;
        null !== $offset && $self['offset'] = $offset;
        null !== $query && $self['query'] = $query;

        return $self;
    }

    /**
     * @param Filter|FilterShape $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }

    /**
     * Number of followings to return (1-50). Must be at least 1. Must not be greater than 50.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Pagination offset. Must be at least 0.
     */
    public function withOffset(int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }

    /**
     * Search within following name/username.
     */
    public function withQuery(?string $query): self
    {
        $self = clone $this;
        $self['query'] = $query;

        return $self;
    }
}
