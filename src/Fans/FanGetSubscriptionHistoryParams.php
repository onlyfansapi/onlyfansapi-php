<?php

declare(strict_types=1);

namespace Onlyfansapi\Fans;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Get Subscription History for a given OnlyFans User ID. This can be useful, for example, when the user's subscribed to your account for the first time.
 *
 * @see Onlyfansapi\Services\FansService::getSubscriptionHistory()
 *
 * @phpstan-type FanGetSubscriptionHistoryParamsShape = array{account: string}
 */
final class FanGetSubscriptionHistoryParams implements BaseModel
{
    /** @use SdkModel<FanGetSubscriptionHistoryParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * `new FanGetSubscriptionHistoryParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FanGetSubscriptionHistoryParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FanGetSubscriptionHistoryParams)->withAccount(...)
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
    public static function with(string $account): self
    {
        $self = new self;

        $self['account'] = $account;

        return $self;
    }

    public function withAccount(string $account): self
    {
        $self = clone $this;
        $self['account'] = $account;

        return $self;
    }
}
