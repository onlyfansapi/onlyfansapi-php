<?php

declare(strict_types=1);

namespace Onlyfansapi\TrackingLinks\TrackingLinkGetStatsResponse\Data;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type MonthlyMetricShape = array{
 *   clicks?: int|null,
 *   revenue?: float|null,
 *   spenders?: int|null,
 *   subs?: int|null,
 *   timestamp?: string|null,
 * }
 */
final class MonthlyMetric implements BaseModel
{
    /** @use SdkModel<MonthlyMetricShape> */
    use SdkModel;

    #[Optional]
    public ?int $clicks;

    #[Optional]
    public ?float $revenue;

    #[Optional]
    public ?int $spenders;

    #[Optional]
    public ?int $subs;

    #[Optional]
    public ?string $timestamp;

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
        ?int $clicks = null,
        ?float $revenue = null,
        ?int $spenders = null,
        ?int $subs = null,
        ?string $timestamp = null,
    ): self {
        $self = new self;

        null !== $clicks && $self['clicks'] = $clicks;
        null !== $revenue && $self['revenue'] = $revenue;
        null !== $spenders && $self['spenders'] = $spenders;
        null !== $subs && $self['subs'] = $subs;
        null !== $timestamp && $self['timestamp'] = $timestamp;

        return $self;
    }

    public function withClicks(int $clicks): self
    {
        $self = clone $this;
        $self['clicks'] = $clicks;

        return $self;
    }

    public function withRevenue(float $revenue): self
    {
        $self = clone $this;
        $self['revenue'] = $revenue;

        return $self;
    }

    public function withSpenders(int $spenders): self
    {
        $self = clone $this;
        $self['spenders'] = $spenders;

        return $self;
    }

    public function withSubs(int $subs): self
    {
        $self = clone $this;
        $self['subs'] = $subs;

        return $self;
    }

    public function withTimestamp(string $timestamp): self
    {
        $self = clone $this;
        $self['timestamp'] = $timestamp;

        return $self;
    }
}
