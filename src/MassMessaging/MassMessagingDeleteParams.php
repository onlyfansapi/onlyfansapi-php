<?php

declare(strict_types=1);

namespace OnlyFansAPI\MassMessaging;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Unsend a recently sent mass message, or delete a scheduled/saved message. When unsending, purchased content will continue to be able to viewable.
 *
 * @see OnlyFansAPI\Services\MassMessagingService::delete()
 *
 * @phpstan-type MassMessagingDeleteParamsShape = array{account: string}
 */
final class MassMessagingDeleteParams implements BaseModel
{
    /** @use SdkModel<MassMessagingDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * `new MassMessagingDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MassMessagingDeleteParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MassMessagingDeleteParams)->withAccount(...)
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
