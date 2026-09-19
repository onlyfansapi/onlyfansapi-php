<?php

declare(strict_types=1);

namespace OnlyFansAPI\Chargebacks\ChargebackCalculateRatioResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{chargebacksRatio?: float|null}
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?float $chargebacksRatio;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?float $chargebacksRatio = null): self
    {
        $self = new self;

        null !== $chargebacksRatio && $self['chargebacksRatio'] = $chargebacksRatio;

        return $self;
    }

    public function withChargebacksRatio(float $chargebacksRatio): self
    {
        $self = clone $this;
        $self['chargebacksRatio'] = $chargebacksRatio;

        return $self;
    }
}
