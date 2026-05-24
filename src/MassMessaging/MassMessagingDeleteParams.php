<?php

declare(strict_types=1);

namespace Onlyfansapi\MassMessaging;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Unsend a recently sent mass message, or delete a scheduled/saved message. When unsending, purchased content will continue to be able to viewable.
 *
 * @see Onlyfansapi\Services\MassMessagingService::delete()
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
