<?php

declare(strict_types=1);

namespace OnlyFansAPI\UserLists\Users;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Add multiple Users To OnlyFans User List.
 *
 * @see OnlyFansAPI\Services\UserLists\UsersService::add()
 *
 * @phpstan-type UserAddParamsShape = array{
 *   account: string, ids: list<string>, skipInvalid?: bool|null
 * }
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
     * Set to `true` to skip the User IDs OnlyFans refuses instead of failing the whole batch. We drop the rejected IDs and retry the remainder for you (up to 5 OnlyFans attempts, each costing 1 credit), then respond `200` with `data.added` (the IDs that made it in) and `data.failed` (an object mapping each rejected User ID to the reason OnlyFans gave). Note this changes the shape of `data` — see the example responses. Failures that are not about individual users (e.g. an invalid or inaccessible list ID) still return the regular `400`.
     */
    #[Optional('skip_invalid')]
    public ?bool $skipInvalid;

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
    public static function with(
        string $account,
        array $ids,
        ?bool $skipInvalid = null
    ): self {
        $self = new self;

        $self['account'] = $account;
        $self['ids'] = $ids;

        null !== $skipInvalid && $self['skipInvalid'] = $skipInvalid;

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

    /**
     * Set to `true` to skip the User IDs OnlyFans refuses instead of failing the whole batch. We drop the rejected IDs and retry the remainder for you (up to 5 OnlyFans attempts, each costing 1 credit), then respond `200` with `data.added` (the IDs that made it in) and `data.failed` (an object mapping each rejected User ID to the reason OnlyFans gave). Note this changes the shape of `data` — see the example responses. Failures that are not about individual users (e.g. an invalid or inaccessible list ID) still return the regular `400`.
     */
    public function withSkipInvalid(bool $skipInvalid): self
    {
        $self = clone $this;
        $self['skipInvalid'] = $skipInvalid;

        return $self;
    }
}
