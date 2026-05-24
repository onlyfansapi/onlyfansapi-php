<?php

declare(strict_types=1);

namespace Onlyfansapi\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember1\Data;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type TotalShape = array{current?: string|null, delta?: float|null}
 */
final class Total implements BaseModel
{
    /** @use SdkModel<TotalShape> */
    use SdkModel;

    #[Optional]
    public ?string $current;

    #[Optional]
    public ?float $delta;

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
        ?string $current = null,
        ?float $delta = null
    ): self {
        $self = new self;

        null !== $current && $self['current'] = $current;
        null !== $delta && $self['delta'] = $delta;

        return $self;
    }

    public function withCurrent(string $current): self
    {
        $self = clone $this;
        $self['current'] = $current;

        return $self;
    }

    public function withDelta(float $delta): self
    {
        $self = clone $this;
        $self['delta'] = $delta;

        return $self;
    }
}
