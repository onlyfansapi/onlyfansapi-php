<?php

declare(strict_types=1);

namespace OnlyFansAPI\Stories\Highlights\HighlightListResponse\_Meta;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type _RateLimitsShape = array{
 *   limitDay?: string|null,
 *   limitMinute?: int|null,
 *   notice?: string|null,
 *   remainingDay?: string|null,
 *   remainingMinute?: int|null,
 * }
 */
final class _RateLimits implements BaseModel
{
    /** @use SdkModel<_RateLimitsShape> */
    use SdkModel;

    #[Optional('limit_day', nullable: true)]
    public ?string $limitDay;

    #[Optional('limit_minute')]
    public ?int $limitMinute;

    #[Optional]
    public ?string $notice;

    #[Optional('remaining_day', nullable: true)]
    public ?string $remainingDay;

    #[Optional('remaining_minute')]
    public ?int $remainingMinute;

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
        ?string $limitDay = null,
        ?int $limitMinute = null,
        ?string $notice = null,
        ?string $remainingDay = null,
        ?int $remainingMinute = null,
    ): self {
        $self = new self;

        null !== $limitDay && $self['limitDay'] = $limitDay;
        null !== $limitMinute && $self['limitMinute'] = $limitMinute;
        null !== $notice && $self['notice'] = $notice;
        null !== $remainingDay && $self['remainingDay'] = $remainingDay;
        null !== $remainingMinute && $self['remainingMinute'] = $remainingMinute;

        return $self;
    }

    public function withLimitDay(?string $limitDay): self
    {
        $self = clone $this;
        $self['limitDay'] = $limitDay;

        return $self;
    }

    public function withLimitMinute(int $limitMinute): self
    {
        $self = clone $this;
        $self['limitMinute'] = $limitMinute;

        return $self;
    }

    public function withNotice(string $notice): self
    {
        $self = clone $this;
        $self['notice'] = $notice;

        return $self;
    }

    public function withRemainingDay(?string $remainingDay): self
    {
        $self = clone $this;
        $self['remainingDay'] = $remainingDay;

        return $self;
    }

    public function withRemainingMinute(int $remainingMinute): self
    {
        $self = clone $this;
        $self['remainingMinute'] = $remainingMinute;

        return $self;
    }
}
