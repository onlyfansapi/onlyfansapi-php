<?php

declare(strict_types=1);

namespace Onlyfansapi\Payouts;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Request a payout withdrawal, if the frequency is set to manual. Refer to our `/payouts/balances` endpoint to retrieve the minimum and maximum withdrawal amounts.
 *
 * @see Onlyfansapi\Services\PayoutsService::requestManualWithdrawal()
 *
 * @phpstan-type PayoutRequestManualWithdrawalParamsShape = array{amount: int}
 */
final class PayoutRequestManualWithdrawalParams implements BaseModel
{
    /** @use SdkModel<PayoutRequestManualWithdrawalParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The amount to withdraw. Amount may not be higher than the current balance.
     */
    #[Required]
    public int $amount;

    /**
     * `new PayoutRequestManualWithdrawalParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PayoutRequestManualWithdrawalParams::with(amount: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PayoutRequestManualWithdrawalParams)->withAmount(...)
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
     */
    public static function with(int $amount): self
    {
        $self = new self;

        $self['amount'] = $amount;

        return $self;
    }

    /**
     * The amount to withdraw. Amount may not be higher than the current balance.
     */
    public function withAmount(int $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }
}
