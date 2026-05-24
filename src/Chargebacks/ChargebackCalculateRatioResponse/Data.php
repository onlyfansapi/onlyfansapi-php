<?php

declare(strict_types=1);

namespace Onlyfansapi\Chargebacks\ChargebackCalculateRatioResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

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
