<?php

declare(strict_types=1);

namespace OnlyFansAPI\Users\Subscribe;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Unsubscribe from a user's profile.
 *
 * @see OnlyFansAPI\Services\Users\SubscribeService::delete()
 *
 * @phpstan-type SubscribeDeleteParamsShape = array{
 *   account: string, reason: string
 * }
 */
final class SubscribeDeleteParams implements BaseModel
{
    /** @use SdkModel<SubscribeDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * Reason for unsubscribing. Valid options: `1,2,3,4,5`. Leave empty for `No specific reason`.
     */
    #[Required]
    public string $reason;

    /**
     * `new SubscribeDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubscribeDeleteParams::with(account: ..., reason: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubscribeDeleteParams)->withAccount(...)->withReason(...)
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
    public static function with(string $account, string $reason): self
    {
        $self = new self;

        $self['account'] = $account;
        $self['reason'] = $reason;

        return $self;
    }

    public function withAccount(string $account): self
    {
        $self = clone $this;
        $self['account'] = $account;

        return $self;
    }

    /**
     * Reason for unsubscribing. Valid options: `1,2,3,4,5`. Leave empty for `No specific reason`.
     */
    public function withReason(string $reason): self
    {
        $self = clone $this;
        $self['reason'] = $reason;

        return $self;
    }
}
