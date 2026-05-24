<?php

declare(strict_types=1);

namespace Onlyfansapi\Payouts\PayoutGetEarningStatisticsResponse\Data\List_\Total;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type AllShape = array{totalGross?: float|null, totalNet?: float|null}
 */
final class All implements BaseModel
{
    /** @use SdkModel<AllShape> */
    use SdkModel;

    #[Optional('total_gross')]
    public ?float $totalGross;

    #[Optional('total_net')]
    public ?float $totalNet;

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
        ?float $totalGross = null,
        ?float $totalNet = null
    ): self {
        $self = new self;

        null !== $totalGross && $self['totalGross'] = $totalGross;
        null !== $totalNet && $self['totalNet'] = $totalNet;

        return $self;
    }

    public function withTotalGross(float $totalGross): self
    {
        $self = clone $this;
        $self['totalGross'] = $totalGross;

        return $self;
    }

    public function withTotalNet(float $totalNet): self
    {
        $self = clone $this;
        $self['totalNet'] = $totalNet;

        return $self;
    }
}
