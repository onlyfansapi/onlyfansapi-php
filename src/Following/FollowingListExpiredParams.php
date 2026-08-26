<?php

declare(strict_types=1);

namespace OnlyFansAPI\Following;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Following\FollowingListExpiredParams\Filter;
use OnlyFansAPI\Following\FollowingListExpiredParams\Sort;
use OnlyFansAPI\Following\FollowingListExpiredParams\SortDirection;

/**
 * Get a paginated list of expired followings for an Account. This list has no order guarantee. Unlike the all and active lists, it is sorted by neither `subscribedByData.subscribeAt` nor `subscribedByData.expiredAt`. To poll for new expirations, page through the full list each cycle (`limit=50`, follow `_pagination.next_page` until it is null) and diff it against your own store using `subscribedByData.expiredAt`. Do NOT stop early at the first entry you have already seen, as that can silently skip real expirations. An empty page is not the end of the list either: OnlyFans applies `offset` to the whole following collection and only then filters that window down to expired subscriptions, so early pages can come back empty while hundreds of expired rows still follow. Keep following `_pagination.next_page` until it is `null` instead of stopping at the first empty page. Pass `sort=expire_date` (optionally with `sortDirection`) to get a deterministic order instead — see the parameter description for the caveat that OnlyFans persists the chosen order account-wide. Ordering by expiry descending puts the still-active subscriptions first and moves the expired rows to the tail of the collection, so prefer `sortDirection=asc` or `sort=is_expired` for expired-first results; for that reason `sort=expire_date` defaults to `asc` on this list when no `sortDirection` is given.
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
 *   sort?: null|Sort|value-of<Sort>,
 *   sortDirection?: null|SortDirection|value-of<SortDirection>,
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

    /**
     * Order the list by `last_activity` (the followed creator's last activity), `expire_date` (subscription expiry), `subscribe_date` (subscription start) or `is_expired` (expired first — OnlyFans only offers this one on the expired list). Omit it to keep whichever order is currently stored for the account. **Note:** OnlyFans persists this order account-wide, so it also applies to later requests that omit `sort` and to the creator's own onlyfans.com UI, until it is changed again. **Expired list:** OnlyFans applies `offset` to the whole following collection and only then filters it down to expired subscriptions, so ordering by expiry descending puts the still-active subscriptions first and moves the expired rows to the tail of the collection — the first several hundred offsets then come back empty. Use `sortDirection=asc` or `sort=is_expired` to get expired-first results. For that reason `sort=expire_date` on the expired list defaults to `asc` instead of `desc` when you do not pass `sortDirection`. Whatever order you pick, an empty page is **not** the end of the list: keep following `_pagination.next_page` until it is `null` rather than stopping at the first empty page. This field is required when <code>sortDirection</code> is present.
     *
     * @var value-of<Sort>|null $sort
     */
    #[Optional(enum: Sort::class, nullable: true)]
    public ?string $sort;

    /**
     * Direction for `sort`: `desc` (default) or `asc`. Requires `sort` to be set. Exception: `sort=expire_date` on the expired list defaults to `asc`, because `desc` moves the expired rows to the tail of the underlying collection and leaves the early pages empty. Passing `sortDirection` explicitly always wins.
     *
     * @var value-of<SortDirection>|null $sortDirection
     */
    #[Optional(enum: SortDirection::class, nullable: true)]
    public ?string $sortDirection;

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
     * @param Sort|value-of<Sort>|null $sort
     * @param SortDirection|value-of<SortDirection>|null $sortDirection
     */
    public static function with(
        Filter|array|null $filter = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $query = null,
        Sort|string|null $sort = null,
        SortDirection|string|null $sortDirection = null,
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $limit && $self['limit'] = $limit;
        null !== $offset && $self['offset'] = $offset;
        null !== $query && $self['query'] = $query;
        null !== $sort && $self['sort'] = $sort;
        null !== $sortDirection && $self['sortDirection'] = $sortDirection;

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

    /**
     * Order the list by `last_activity` (the followed creator's last activity), `expire_date` (subscription expiry), `subscribe_date` (subscription start) or `is_expired` (expired first — OnlyFans only offers this one on the expired list). Omit it to keep whichever order is currently stored for the account. **Note:** OnlyFans persists this order account-wide, so it also applies to later requests that omit `sort` and to the creator's own onlyfans.com UI, until it is changed again. **Expired list:** OnlyFans applies `offset` to the whole following collection and only then filters it down to expired subscriptions, so ordering by expiry descending puts the still-active subscriptions first and moves the expired rows to the tail of the collection — the first several hundred offsets then come back empty. Use `sortDirection=asc` or `sort=is_expired` to get expired-first results. For that reason `sort=expire_date` on the expired list defaults to `asc` instead of `desc` when you do not pass `sortDirection`. Whatever order you pick, an empty page is **not** the end of the list: keep following `_pagination.next_page` until it is `null` rather than stopping at the first empty page. This field is required when <code>sortDirection</code> is present.
     *
     * @param Sort|value-of<Sort>|null $sort
     */
    public function withSort(Sort|string|null $sort): self
    {
        $self = clone $this;
        $self['sort'] = $sort;

        return $self;
    }

    /**
     * Direction for `sort`: `desc` (default) or `asc`. Requires `sort` to be set. Exception: `sort=expire_date` on the expired list defaults to `asc`, because `desc` moves the expired rows to the tail of the underlying collection and leaves the early pages empty. Passing `sortDirection` explicitly always wins.
     *
     * @param SortDirection|value-of<SortDirection>|null $sortDirection
     */
    public function withSortDirection(
        SortDirection|string|null $sortDirection
    ): self {
        $self = clone $this;
        $self['sortDirection'] = $sortDirection;

        return $self;
    }
}
