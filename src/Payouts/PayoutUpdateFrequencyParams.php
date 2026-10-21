<?php

declare(strict_types=1);

namespace OnlyFansAPI\Payouts;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Payouts\PayoutUpdateFrequencyParams\Frequency;

/**
 * Update the payout frequency for the account (Manual, Weekly or Monthly).
 *
 * @see OnlyFansAPI\Services\PayoutsService::updateFrequency()
 *
 * @phpstan-type PayoutUpdateFrequencyParamsShape = array{
 *   frequency: Frequency|value-of<Frequency>
 * }
 */
final class PayoutUpdateFrequencyParams implements BaseModel
{
    /** @use SdkModel<PayoutUpdateFrequencyParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The new payout frequency.
     *
     * @var value-of<Frequency> $frequency
     */
    #[Required(enum: Frequency::class)]
    public string $frequency;

    /**
     * `new PayoutUpdateFrequencyParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PayoutUpdateFrequencyParams::with(frequency: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PayoutUpdateFrequencyParams)->withFrequency(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Frequency|value-of<Frequency> $frequency
     */
    public static function with(Frequency|string $frequency): self
    {
        $self = new self;

        $self['frequency'] = $frequency;

        return $self;
    }

    /**
     * The new payout frequency.
     *
     * @param Frequency|value-of<Frequency> $frequency
     */
    public function withFrequency(Frequency|string $frequency): self
    {
        $self = clone $this;
        $self['frequency'] = $frequency;

        return $self;
    }
}
