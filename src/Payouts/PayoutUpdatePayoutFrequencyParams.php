<?php

declare(strict_types=1);

namespace Onlyfansapi\Payouts;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Payouts\PayoutUpdatePayoutFrequencyParams\Frequency;

/**
 * Update the payout frequency for the account (Manual, Weekly or Monthly).
 *
 * @see Onlyfansapi\Services\PayoutsService::updatePayoutFrequency()
 *
 * @phpstan-type PayoutUpdatePayoutFrequencyParamsShape = array{
 *   frequency: Frequency|value-of<Frequency>
 * }
 */
final class PayoutUpdatePayoutFrequencyParams implements BaseModel
{
    /** @use SdkModel<PayoutUpdatePayoutFrequencyParamsShape> */
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
     * `new PayoutUpdatePayoutFrequencyParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PayoutUpdatePayoutFrequencyParams::with(frequency: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PayoutUpdatePayoutFrequencyParams)->withFrequency(...)
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
