<?php

declare(strict_types=1);

namespace OnlyFansAPI\Settings\WelcomeMessage\WelcomeMessageToggleResponse\_Meta;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type _RateLimitsShape = array{
 *   limitDay?: int|null,
 *   limitMinute?: int|null,
 *   remainingDay?: int|null,
 *   remainingMinute?: int|null,
 * }
 */
final class _RateLimits implements BaseModel
{
    /** @use SdkModel<_RateLimitsShape> */
    use SdkModel;

    #[Optional('limit_day')]
    public ?int $limitDay;

    #[Optional('limit_minute')]
    public ?int $limitMinute;

    #[Optional('remaining_day')]
    public ?int $remainingDay;

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
        ?int $limitDay = null,
        ?int $limitMinute = null,
        ?int $remainingDay = null,
        ?int $remainingMinute = null,
    ): self {
        $self = new self;

        null !== $limitDay && $self['limitDay'] = $limitDay;
        null !== $limitMinute && $self['limitMinute'] = $limitMinute;
        null !== $remainingDay && $self['remainingDay'] = $remainingDay;
        null !== $remainingMinute && $self['remainingMinute'] = $remainingMinute;

        return $self;
    }

    public function withLimitDay(int $limitDay): self
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

    public function withRemainingDay(int $remainingDay): self
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
