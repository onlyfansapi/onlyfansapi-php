<?php

declare(strict_types=1);

namespace OnlyFansAPI\Users;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Save on credits by getting up to 10 user details with a single request. User details are retrieved using the current `{account}` so fields like `subscribedOnData` which include potential subscription details will be included.
 *
 * @see OnlyFansAPI\Services\UsersService::list()
 *
 * @phpstan-type UserListParamsShape = array{ids: string}
 */
final class UserListParams implements BaseModel
{
    /** @use SdkModel<UserListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Comma-separated list of user IDs (max. 10 IDs). Must be at least 1 character.
     */
    #[Required]
    public string $ids;

    /**
     * `new UserListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UserListParams::with(ids: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UserListParams)->withIDs(...)
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
    public static function with(string $ids): self
    {
        $self = new self;

        $self['ids'] = $ids;

        return $self;
    }

    /**
     * Comma-separated list of user IDs (max. 10 IDs). Must be at least 1 character.
     */
    public function withIDs(string $ids): self
    {
        $self = clone $this;
        $self['ids'] = $ids;

        return $self;
    }
}
