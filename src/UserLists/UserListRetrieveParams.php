<?php

declare(strict_types=1);

namespace Onlyfansapi\UserLists;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Get a user list.
 *
 * @see Onlyfansapi\Services\UserListsService::retrieve()
 *
 * @phpstan-type UserListRetrieveParamsShape = array{account: string}
 */
final class UserListRetrieveParams implements BaseModel
{
    /** @use SdkModel<UserListRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * `new UserListRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UserListRetrieveParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UserListRetrieveParams)->withAccount(...)
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
