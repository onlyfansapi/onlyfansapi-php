<?php

declare(strict_types=1);

namespace OnlyFansAPI\Users\Restrict;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Unrestrict a previously restricted user. You will start seeing messages and comments from them again.
 *
 * @see OnlyFansAPI\Services\Users\RestrictService::delete()
 *
 * @phpstan-type RestrictDeleteParamsShape = array{account: string}
 */
final class RestrictDeleteParams implements BaseModel
{
    /** @use SdkModel<RestrictDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * `new RestrictDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RestrictDeleteParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RestrictDeleteParams)->withAccount(...)
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
