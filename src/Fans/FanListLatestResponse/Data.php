<?php

declare(strict_types=1);

namespace Onlyfansapi\Fans\FanListLatestResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Fans\FanListLatestResponse\Data\User;

/**
 * @phpstan-import-type UserShape from \Onlyfansapi\Fans\FanListLatestResponse\Data\User
 *
 * @phpstan-type DataShape = array{
 *   hasMore?: bool|null, offset?: int|null, users?: list<User|UserShape>|null
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?bool $hasMore;

    #[Optional]
    public ?int $offset;

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
    public static function with(
        ?bool $hasMore = null,
        ?int $offset = null,
        ?array $users = null
    ): self {
        $self = new self;

        null !== $hasMore && $self['hasMore'] = $hasMore;
        null !== $offset && $self['offset'] = $offset;
        null !== $users && $self['users'] = $users;

        return $self;
    }

    public function withHasMore(bool $hasMore): self
    {
        $self = clone $this;
        $self['hasMore'] = $hasMore;

        return $self;
    }

    public function withOffset(int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

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
