<?php

declare(strict_types=1);

namespace OnlyFansAPI\Fans\FanListTopResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Fans\FanListTopResponse\Data\User;

/**
 * @phpstan-import-type UserShape from \OnlyFansAPI\Fans\FanListTopResponse\Data\User
 *
 * @phpstan-type DataShape = array{users?: list<User|UserShape>|null}
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /** @var list<User>|null $users */
    #[Optional(list: User::class)]
    public ?array $users;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<User|UserShape>|null $users
     */
    public static function with(?array $users = null): self
    {
        $self = new self;

        null !== $users && $self['users'] = $users;

        return $self;
    }

    /**
     * @param list<User|UserShape> $users
     */
    public function withUsers(array $users): self
    {
        $self = clone $this;
        $self['users'] = $users;

        return $self;
    }
}
