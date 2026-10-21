<?php

declare(strict_types=1);

namespace OnlyFansAPI\UserLists;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Create a OnlyFans User List.
 *
 * @see OnlyFansAPI\Services\UserListsService::create()
 *
 * @phpstan-type UserListCreateParamsShape = array{name: string}
 */
final class UserListCreateParams implements BaseModel
{
    /** @use SdkModel<UserListCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Must not be greater than 64 characters.
     */
    #[Required]
    public string $name;

    /**
     * `new UserListCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UserListCreateParams::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UserListCreateParams)->withName(...)
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
    public static function with(string $name): self
    {
        $self = new self;

        $self['name'] = $name;

        return $self;
    }

    /**
     * Must not be greater than 64 characters.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
