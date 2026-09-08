<?php

declare(strict_types=1);

namespace OnlyFansAPI\UserLists\Users;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Remove all users from a OnlyFans User List.
 *
 * @see OnlyFansAPI\Services\UserLists\UsersService::clear()
 *
 * @phpstan-type UserClearParamsShape = array{account: string}
 */
final class UserClearParams implements BaseModel
{
    /** @use SdkModel<UserClearParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * `new UserClearParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UserClearParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UserClearParams)->withAccount(...)
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
