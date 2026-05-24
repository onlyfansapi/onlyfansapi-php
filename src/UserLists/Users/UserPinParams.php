<?php

declare(strict_types=1);

namespace Onlyfansapi\UserLists\Users;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Pin a user in any OnlyFans user list.
 *
 * @see Onlyfansapi\Services\UserLists\UsersService::pin()
 *
 * @phpstan-type UserPinParamsShape = array{account: string, userListID: string}
 */
final class UserPinParams implements BaseModel
{
    /** @use SdkModel<UserPinParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    #[Required]
    public string $userListID;

    /**
     * `new UserPinParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UserPinParams::with(account: ..., userListID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UserPinParams)->withAccount(...)->withUserListID(...)
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
