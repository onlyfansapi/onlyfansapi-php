<?php

declare(strict_types=1);

namespace Onlyfansapi\Users;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Get OnlyFans Profile details for a given username. User details are retrieved using the current current `{account}` so fields like `subscribedOnData` which include potential subscription details will be included.
 *
 * @see Onlyfansapi\Services\UsersService::retrieve()
 *
 * @phpstan-type UserRetrieveParamsShape = array{account: string}
 */
final class UserRetrieveParams implements BaseModel
{
    /** @use SdkModel<UserRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * `new UserRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UserRetrieveParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UserRetrieveParams)->withAccount(...)
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
