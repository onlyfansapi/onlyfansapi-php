<?php

declare(strict_types=1);

namespace OnlyFansAPI\UserLists\Users;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Remove User from OnlyFans User List.
 *
 * @see OnlyFansAPI\Services\UserLists\UsersService::remove()
 *
 * @phpstan-type UserRemoveParamsShape = array{account: string, userListID: string}
 */
final class UserRemoveParams implements BaseModel
{
    /** @use SdkModel<UserRemoveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    #[Required]
    public string $userListID;

    /**
     * `new UserRemoveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UserRemoveParams::with(account: ..., userListID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UserRemoveParams)->withAccount(...)->withUserListID(...)
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
    public static function with(string $account, string $userListID): self
    {
        $self = new self;

        $self['account'] = $account;
        $self['userListID'] = $userListID;

        return $self;
    }

    public function withAccount(string $account): self
    {
        $self = clone $this;
        $self['account'] = $account;

        return $self;
    }

    public function withUserListID(string $userListID): self
    {
        $self = clone $this;
        $self['userListID'] = $userListID;

        return $self;
    }
}
