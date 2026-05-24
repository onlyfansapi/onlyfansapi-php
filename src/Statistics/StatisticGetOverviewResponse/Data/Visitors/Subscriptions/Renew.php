<?php

declare(strict_types=1);

namespace Onlyfansapi\Statistics\StatisticGetOverviewResponse\Data\Visitors\Subscriptions;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type RenewShape = array{delta?: int|null, total?: int|null}
 */
final class Renew implements BaseModel
{
    /** @use SdkModel<RenewShape> */
    use SdkModel;

    #[Optional]
    public ?int $delta;

    #[Optional]
    public ?int $total;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $delta = null, ?int $total = null): self
    {
        $self = new self;

        null !== $delta && $self['delta'] = $delta;
        null !== $total && $self['total'] = $total;

        return $self;
    }

    public function withDelta(int $delta): self
    {
        $self = clone $this;
        $self['delta'] = $delta;

        return $self;
    }

    public function withTotal(int $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }
}
