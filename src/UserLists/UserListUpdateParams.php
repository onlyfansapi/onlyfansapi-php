<?php

declare(strict_types=1);

namespace Onlyfansapi\UserLists;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Update a OnlyFans User List.
 *
 * @see Onlyfansapi\Services\UserListsService::update()
 *
 * @phpstan-type UserListUpdateParamsShape = array{
 *   account: string, name: string, isPinnedToFeed?: bool|null
 * }
 */
final class UserListUpdateParams implements BaseModel
{
    /** @use SdkModel<UserListUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * The new name for the User List.
     */
    #[Required]
    public string $name;

    /**
     * Whether to pin the User List to feed to the OnlyFans homepage or not.
     */
    #[Optional(nullable: true)]
    public ?bool $isPinnedToFeed;

    /**
     * `new UserListUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UserListUpdateParams::with(account: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UserListUpdateParams)->withAccount(...)->withName(...)
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
        string $name,
        ?bool $isPinnedToFeed = null
    ): self {
        $self = new self;

        $self['account'] = $account;
        $self['name'] = $name;

        null !== $isPinnedToFeed && $self['isPinnedToFeed'] = $isPinnedToFeed;

        return $self;
    }

    public function withAccount(string $account): self
    {
        $self = clone $this;
        $self['account'] = $account;

        return $self;
    }

    /**
     * The new name for the User List.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Whether to pin the User List to feed to the OnlyFans homepage or not.
     */
    public function withIsPinnedToFeed(?bool $isPinnedToFeed): self
    {
        $self = clone $this;
        $self['isPinnedToFeed'] = $isPinnedToFeed;

        return $self;
    }
}
