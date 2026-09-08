<?php

declare(strict_types=1);

namespace OnlyFansAPI\Fans\FanListAllParams;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Fans\FanListAllParams\Filter\Online;

/**
 * @phpstan-type FilterShape = array{
 *   duration?: int|null,
 *   maxTotalSpent?: float|null,
 *   online?: null|Online|value-of<Online>,
 *   tips?: int|null,
 *   totalSpent?: int|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter by minimum subscription duration in months. Must use bracket syntax: filter[duration]=1 — the dot form (filter.duration=1) is rejected with a 422, because PHP rewrites it to `filter_duration` and the filter could not be applied. Must be at least 0.
     */
    #[Optional]
    public ?int $duration;

    /**
     * Filter by **maximum** amount total spent by a fan — use `filter[max_total_spent]=0` to isolate fans who have never spent. Combine with `filter[total_spent]` for a range. Must use bracket syntax: filter[max_total_spent]=0 — the dot form is rejected with a 422, because PHP rewrites it to `filter_max_total_spent` and the filter could not be applied.
     *
     * OnlyFans itself has no maximum-spend filter, so this one is resolved against OnlyFansAPI's own fan index instead of being proxied. The fan objects in `data.list` are still fetched live from OnlyFans and are re-checked against your filters before being returned, but only fans we have already indexed for this account can appear. Each response reports its own coverage under `data._source`; when `data._source.is_complete` is `false` a full-base backfill is queued automatically, so retry later for a complete answer.
     *
     * `data._source.omitted_from_page` counts fans that matched your filters but which OnlyFans returned no usable data for on that page (a deleted account, or a partial response). They are left out of `data.list` and not revisited later in the same walk, so a non-zero value means that page was short — start a fresh walk to retry them. Cannot be combined with `filter[online]`. Must be at least 0.
     */
    #[Optional('max_total_spent')]
    public ?float $maxTotalSpent;

    /**
     * Filter by online status (`1` for online fans). Must use bracket syntax: filter[online]=1 — the dot form (filter.online=1) is rejected with a 422, because PHP rewrites it to `filter_online` and the filter could not be applied.
     *
     * @var value-of<Online>|null $online
     */
    #[Optional(enum: Online::class, nullable: true)]
    public ?int $online;

    /**
     * Filter by minimum tips. Must use bracket syntax: filter[tips]=100 — the dot form (filter.tips=100) is rejected with a 422, because PHP rewrites it to `filter_tips` and the filter could not be applied. Must be at least 0.
     */
    #[Optional]
    public ?int $tips;

    /**
     * Filter by minimum amount total spent by a fan. Must use bracket syntax: filter[total_spent]=100 — the dot form (filter.total_spent=100) is rejected with a 422, because PHP rewrites it to `filter_total_spent` and the filter could not be applied. Must be at least 0.
     */
    #[Optional('total_spent')]
    public ?int $totalSpent;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Online|value-of<Online>|null $online
     */
    public static function with(
        ?int $duration = null,
        ?float $maxTotalSpent = null,
        Online|int|null $online = null,
        ?int $tips = null,
        ?int $totalSpent = null,
    ): self {
        $self = new self;

        null !== $duration && $self['duration'] = $duration;
        null !== $maxTotalSpent && $self['maxTotalSpent'] = $maxTotalSpent;
        null !== $online && $self['online'] = $online;
        null !== $tips && $self['tips'] = $tips;
        null !== $totalSpent && $self['totalSpent'] = $totalSpent;

        return $self;
    }

    /**
     * Filter by minimum subscription duration in months. Must use bracket syntax: filter[duration]=1 — the dot form (filter.duration=1) is rejected with a 422, because PHP rewrites it to `filter_duration` and the filter could not be applied. Must be at least 0.
     */
    public function withDuration(int $duration): self
    {
        $self = clone $this;
        $self['duration'] = $duration;

        return $self;
    }

    /**
     * Filter by **maximum** amount total spent by a fan — use `filter[max_total_spent]=0` to isolate fans who have never spent. Combine with `filter[total_spent]` for a range. Must use bracket syntax: filter[max_total_spent]=0 — the dot form is rejected with a 422, because PHP rewrites it to `filter_max_total_spent` and the filter could not be applied.
     *
     * OnlyFans itself has no maximum-spend filter, so this one is resolved against OnlyFansAPI's own fan index instead of being proxied. The fan objects in `data.list` are still fetched live from OnlyFans and are re-checked against your filters before being returned, but only fans we have already indexed for this account can appear. Each response reports its own coverage under `data._source`; when `data._source.is_complete` is `false` a full-base backfill is queued automatically, so retry later for a complete answer.
     *
     * `data._source.omitted_from_page` counts fans that matched your filters but which OnlyFans returned no usable data for on that page (a deleted account, or a partial response). They are left out of `data.list` and not revisited later in the same walk, so a non-zero value means that page was short — start a fresh walk to retry them. Cannot be combined with `filter[online]`. Must be at least 0.
     */
    public function withMaxTotalSpent(float $maxTotalSpent): self
    {
        $self = clone $this;
        $self['maxTotalSpent'] = $maxTotalSpent;

        return $self;
    }

    /**
     * Filter by online status (`1` for online fans). Must use bracket syntax: filter[online]=1 — the dot form (filter.online=1) is rejected with a 422, because PHP rewrites it to `filter_online` and the filter could not be applied.
     *
     * @param Online|value-of<Online>|null $online
     */
    public function withOnline(Online|int|null $online): self
    {
        $self = clone $this;
        $self['online'] = $online;

        return $self;
    }

    /**
     * Filter by minimum tips. Must use bracket syntax: filter[tips]=100 — the dot form (filter.tips=100) is rejected with a 422, because PHP rewrites it to `filter_tips` and the filter could not be applied. Must be at least 0.
     */
    public function withTips(int $tips): self
    {
        $self = clone $this;
        $self['tips'] = $tips;

        return $self;
    }

    /**
     * Filter by minimum amount total spent by a fan. Must use bracket syntax: filter[total_spent]=100 — the dot form (filter.total_spent=100) is rejected with a 422, because PHP rewrites it to `filter_total_spent` and the filter could not be applied. Must be at least 0.
     */
    public function withTotalSpent(int $totalSpent): self
    {
        $self = clone $this;
        $self['totalSpent'] = $totalSpent;

        return $self;
    }
}
