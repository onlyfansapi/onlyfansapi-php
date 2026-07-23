<?php

declare(strict_types=1);

namespace OnlyFansAPI\Fans\FanListExpiredParams;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Fans\FanListExpiredParams\Filter\Online;

/**
 * @phpstan-type FilterShape = array{
 *   duration?: int|null,
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
     * Filter by minimum subscription duration in months. Must use bracket syntax: filter[duration]=1 — the dot form (filter.duration=1) is NOT supported and will be ignored. Must be at least 0.
     */
    #[Optional]
    public ?int $duration;

    /**
     * Filter by online status (`1` for online fans). Must use bracket syntax: filter[online]=1 — the dot form (filter.online=1) is NOT supported and will be ignored.
     *
     * @var value-of<Online>|null $online
     */
    #[Optional(enum: Online::class, nullable: true)]
    public ?int $online;

    /**
     * Filter by minimum tips. Must use bracket syntax: filter[tips]=100 — the dot form (filter.tips=100) is NOT supported and will be ignored. Must be at least 0.
     */
    #[Optional]
    public ?int $tips;

    /**
     * Filter by minimum amount total spent by a fan. Must use bracket syntax: filter[total_spent]=100 — the dot form (filter.total_spent=100) is NOT supported and will be ignored. Must be at least 0.
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
        Online|int|null $online = null,
        ?int $tips = null,
        ?int $totalSpent = null,
    ): self {
        $self = new self;

        null !== $duration && $self['duration'] = $duration;
        null !== $online && $self['online'] = $online;
        null !== $tips && $self['tips'] = $tips;
        null !== $totalSpent && $self['totalSpent'] = $totalSpent;

        return $self;
    }

    /**
     * Filter by minimum subscription duration in months. Must use bracket syntax: filter[duration]=1 — the dot form (filter.duration=1) is NOT supported and will be ignored. Must be at least 0.
     */
    public function withDuration(int $duration): self
    {
        $self = clone $this;
        $self['duration'] = $duration;

        return $self;
    }

    /**
     * Filter by online status (`1` for online fans). Must use bracket syntax: filter[online]=1 — the dot form (filter.online=1) is NOT supported and will be ignored.
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
     * Filter by minimum tips. Must use bracket syntax: filter[tips]=100 — the dot form (filter.tips=100) is NOT supported and will be ignored. Must be at least 0.
     */
    public function withTips(int $tips): self
    {
        $self = clone $this;
        $self['tips'] = $tips;

        return $self;
    }

    /**
     * Filter by minimum amount total spent by a fan. Must use bracket syntax: filter[total_spent]=100 — the dot form (filter.total_spent=100) is NOT supported and will be ignored. Must be at least 0.
     */
    public function withTotalSpent(int $totalSpent): self
    {
        $self = clone $this;
        $self['totalSpent'] = $totalSpent;

        return $self;
    }
}
