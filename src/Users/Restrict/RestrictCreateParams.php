<?php

declare(strict_types=1);

namespace OnlyFansAPI\Users\Restrict;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Restrict a user. You will not see messages or comments from this them.
 *
 * @see OnlyFansAPI\Services\Users\RestrictService::create()
 *
 * @phpstan-type RestrictCreateParamsShape = array{account: string}
 */
final class RestrictCreateParams implements BaseModel
{
    /** @use SdkModel<RestrictCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * `new RestrictCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RestrictCreateParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RestrictCreateParams)->withAccount(...)
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
