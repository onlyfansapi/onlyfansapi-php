<?php

declare(strict_types=1);

namespace OnlyFansAPI\UserLists\Users\UserClearResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id?: int|null,
 *   canAddUsers?: bool|null,
 *   canDelete?: bool|null,
 *   canManageUsers?: bool|null,
 *   canPinnedToChat?: bool|null,
 *   canPinnedToFeed?: bool|null,
 *   canUpdate?: bool|null,
 *   direction?: string|null,
 *   isPinnedToChat?: bool|null,
 *   isPinnedToFeed?: bool|null,
 *   name?: string|null,
 *   order?: string|null,
 *   postsCount?: int|null,
 *   sortList?: list<mixed>|null,
 *   type?: string|null,
 *   users?: list<mixed>|null,
 *   usersCount?: int|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional]
    public ?bool $canAddUsers;

    #[Optional]
    public ?bool $canDelete;

    #[Optional]
    public ?bool $canManageUsers;

    #[Optional]
    public ?bool $canPinnedToChat;

    #[Optional]
    public ?bool $canPinnedToFeed;

    #[Optional]
    public ?bool $canUpdate;

    #[Optional]
    public ?string $direction;

    #[Optional]
    public ?bool $isPinnedToChat;

    #[Optional]
    public ?bool $isPinnedToFeed;

    #[Optional]
    public ?string $name;

    #[Optional]
    public ?string $order;

    #[Optional]
    public ?int $postsCount;

    /** @var list<mixed>|null $sortList */
    #[Optional(list: 'mixed')]
    public ?array $sortList;

    #[Optional]
    public ?string $type;

    /** @var list<mixed>|null $users */
    #[Optional(list: 'mixed')]
    public ?array $users;

    #[Optional]
    public ?int $usersCount;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<mixed>|null $sortList
     * @param list<mixed>|null $users
     */
    public static function with(
        ?int $id = null,
        ?bool $canAddUsers = null,
        ?bool $canDelete = null,
        ?bool $canManageUsers = null,
        ?bool $canPinnedToChat = null,
        ?bool $canPinnedToFeed = null,
        ?bool $canUpdate = null,
        ?string $direction = null,
        ?bool $isPinnedToChat = null,
        ?bool $isPinnedToFeed = null,
        ?string $name = null,
        ?string $order = null,
        ?int $postsCount = null,
        ?array $sortList = null,
        ?string $type = null,
        ?array $users = null,
        ?int $usersCount = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $canAddUsers && $self['canAddUsers'] = $canAddUsers;
        null !== $canDelete && $self['canDelete'] = $canDelete;
        null !== $canManageUsers && $self['canManageUsers'] = $canManageUsers;
        null !== $canPinnedToChat && $self['canPinnedToChat'] = $canPinnedToChat;
        null !== $canPinnedToFeed && $self['canPinnedToFeed'] = $canPinnedToFeed;
        null !== $canUpdate && $self['canUpdate'] = $canUpdate;
        null !== $direction && $self['direction'] = $direction;
        null !== $isPinnedToChat && $self['isPinnedToChat'] = $isPinnedToChat;
        null !== $isPinnedToFeed && $self['isPinnedToFeed'] = $isPinnedToFeed;
        null !== $name && $self['name'] = $name;
        null !== $order && $self['order'] = $order;
        null !== $postsCount && $self['postsCount'] = $postsCount;
        null !== $sortList && $self['sortList'] = $sortList;
        null !== $type && $self['type'] = $type;
        null !== $users && $self['users'] = $users;
        null !== $usersCount && $self['usersCount'] = $usersCount;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCanAddUsers(bool $canAddUsers): self
    {
        $self = clone $this;
        $self['canAddUsers'] = $canAddUsers;

        return $self;
    }

    public function withCanDelete(bool $canDelete): self
    {
        $self = clone $this;
        $self['canDelete'] = $canDelete;

        return $self;
    }

    public function withCanManageUsers(bool $canManageUsers): self
    {
        $self = clone $this;
        $self['canManageUsers'] = $canManageUsers;

        return $self;
    }

    public function withCanPinnedToChat(bool $canPinnedToChat): self
    {
        $self = clone $this;
        $self['canPinnedToChat'] = $canPinnedToChat;

        return $self;
    }

    public function withCanPinnedToFeed(bool $canPinnedToFeed): self
    {
        $self = clone $this;
        $self['canPinnedToFeed'] = $canPinnedToFeed;

        return $self;
    }

    public function withCanUpdate(bool $canUpdate): self
    {
        $self = clone $this;
        $self['canUpdate'] = $canUpdate;

        return $self;
    }

    public function withDirection(string $direction): self
    {
        $self = clone $this;
        $self['direction'] = $direction;

        return $self;
    }

    public function withIsPinnedToChat(bool $isPinnedToChat): self
    {
        $self = clone $this;
        $self['isPinnedToChat'] = $isPinnedToChat;

        return $self;
    }

    public function withIsPinnedToFeed(bool $isPinnedToFeed): self
    {
        $self = clone $this;
        $self['isPinnedToFeed'] = $isPinnedToFeed;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withOrder(string $order): self
    {
        $self = clone $this;
        $self['order'] = $order;

        return $self;
    }

    public function withPostsCount(int $postsCount): self
    {
        $self = clone $this;
        $self['postsCount'] = $postsCount;

        return $self;
    }

    /**
     * @param list<mixed> $sortList
     */
    public function withSortList(array $sortList): self
    {
        $self = clone $this;
        $self['sortList'] = $sortList;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param list<mixed> $users
     */
    public function withUsers(array $users): self
    {
        $self = clone $this;
        $self['users'] = $users;

        return $self;
    }

    public function withUsersCount(int $usersCount): self
    {
        $self = clone $this;
        $self['usersCount'] = $usersCount;

        return $self;
    }
}
