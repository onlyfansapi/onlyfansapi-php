<?php

declare(strict_types=1);

namespace OnlyFansAPI\UserLists;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Delete a OnlyFans User List.
 *
 * @see OnlyFansAPI\Services\UserListsService::delete()
 *
 * @phpstan-type UserListDeleteParamsShape = array{account: string}
 */
final class UserListDeleteParams implements BaseModel
{
    /** @use SdkModel<UserListDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * `new UserListDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UserListDeleteParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UserListDeleteParams)->withAccount(...)
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
