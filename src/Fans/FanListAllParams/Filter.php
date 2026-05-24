<?php

declare(strict_types=1);

namespace Onlyfansapi\Fans\FanListAllParams;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type FilterShape = array{
 *   duration?: string|null,
 *   online?: string|null,
 *   tips?: string|null,
 *   totalSpent?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter by minimum subscription duration (days).
     */
    #[Optional(nullable: true)]
    public ?string $duration;

    /**
     * Filter by online status (1 for online).
     */
    #[Optional(nullable: true)]
    public ?string $online;

    /**
     * Filter by minimum tips.
     */
    #[Optional(nullable: true)]
    public ?string $tips;

    /**
     * Filter by minimum total spent.
     */
    #[Optional('total_spent', nullable: true)]
    public ?string $totalSpent;

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
        ?string $duration = null,
        ?string $online = null,
        ?string $tips = null,
        ?string $totalSpent = null,
    ): self {
        $self = new self;

        null !== $duration && $self['duration'] = $duration;
        null !== $online && $self['online'] = $online;
        null !== $tips && $self['tips'] = $tips;
        null !== $totalSpent && $self['totalSpent'] = $totalSpent;

        return $self;
    }

    /**
     * Filter by minimum subscription duration (days).
     */
    public function withDuration(?string $duration): self
    {
        $self = clone $this;
        $self['duration'] = $duration;

        return $self;
    }

    /**
     * Filter by online status (1 for online).
     */
    public function withOnline(?string $online): self
    {
        $self = clone $this;
        $self['online'] = $online;

        return $self;
    }

    /**
     * Filter by minimum tips.
     */
    public function withTips(?string $tips): self
    {
        $self = clone $this;
        $self['tips'] = $tips;

        return $self;
    }

    /**
     * Filter by minimum total spent.
     */
    public function withTotalSpent(?string $totalSpent): self
    {
        $self = clone $this;
        $self['totalSpent'] = $totalSpent;

        return $self;
    }
}
