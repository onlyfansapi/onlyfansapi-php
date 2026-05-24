<?php

declare(strict_types=1);

namespace Onlyfansapi\UserLists\Users;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Add multiple Users To OnlyFans User List.
 *
 * @see Onlyfansapi\Services\UserLists\UsersService::add()
 *
 * @phpstan-type UserAddParamsShape = array{account: string, ids: list<string>}
 */
final class UserAddParams implements BaseModel
{
    /** @use SdkModel<UserAddParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * Array of OnlyFans User IDs to be added into the list.
     *
     * @var list<string> $ids
     */
    #[Required(list: 'string')]
    public array $ids;

    /**
     * `new UserAddParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UserAddParams::with(account: ..., ids: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UserAddParams)->withAccount(...)->withIDs(...)
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
     *
     * @param list<string> $ids
     */
    public static function with(string $account, array $ids): self
    {
        $self = new self;

        $self['account'] = $account;
        $self['ids'] = $ids;

        return $self;
    }

    public function withAccount(string $account): self
    {
        $self = clone $this;
        $self['account'] = $account;

        return $self;
    }

    /**
     * Array of OnlyFans User IDs to be added into the list.
     *
     * @param list<string> $ids
     */
    public function withIDs(array $ids): self
    {
        $self = clone $this;
        $self['ids'] = $ids;

        return $self;
    }
}
