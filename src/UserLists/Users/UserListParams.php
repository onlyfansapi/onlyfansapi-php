<?php

declare(strict_types=1);

namespace Onlyfansapi\UserLists\Users;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Get all users in a OnlyFans User List.
 *
 * @see Onlyfansapi\Services\UserLists\UsersService::list()
 *
 * @phpstan-type UserListParamsShape = array{
 *   account: string, limit?: string|null, offset?: string|null
 * }
 */
final class UserListParams implements BaseModel
{
    /** @use SdkModel<UserListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * Number of users to return (1 - 100). Default = 10.
     */
    #[Optional]
    public ?string $limit;

    /**
     * Number of users to skip for pagination.
     */
    #[Optional]
    public ?string $offset;

    /**
     * `new UserListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UserListParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UserListParams)->withAccount(...)
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
    public static function with(
        string $account,
        ?string $limit = null,
        ?string $offset = null
    ): self {
        $self = new self;

        $self['account'] = $account;

        null !== $limit && $self['limit'] = $limit;
        null !== $offset && $self['offset'] = $offset;

        return $self;
    }

    public function withAccount(string $account): self
    {
        $self = clone $this;
        $self['account'] = $account;

        return $self;
    }

    /**
     * Number of users to return (1 - 100). Default = 10.
     */
    public function withLimit(string $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Number of users to skip for pagination.
     */
    public function withOffset(string $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }
}
