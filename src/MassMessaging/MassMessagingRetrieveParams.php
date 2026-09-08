<?php

declare(strict_types=1);

namespace OnlyFansAPI\MassMessaging;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Get the content and settings of a mass message, including a message scheduled for later.
 *
 * @see OnlyFansAPI\Services\MassMessagingService::retrieve()
 *
 * @phpstan-type MassMessagingRetrieveParamsShape = array{account: string}
 */
final class MassMessagingRetrieveParams implements BaseModel
{
    /** @use SdkModel<MassMessagingRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * `new MassMessagingRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MassMessagingRetrieveParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MassMessagingRetrieveParams)->withAccount(...)
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
