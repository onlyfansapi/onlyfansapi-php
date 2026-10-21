<?php

declare(strict_types=1);

namespace OnlyFansAPI\Notifications\NotificationListResponse\Data;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Notifications\NotificationListResponse\Data\List_\ReplacePairs;
use OnlyFansAPI\Notifications\NotificationListResponse\Data\List_\User;

/**
 * @phpstan-import-type ReplacePairsShape from \OnlyFansAPI\Notifications\NotificationListResponse\Data\List_\ReplacePairs
 * @phpstan-import-type UserShape from \OnlyFansAPI\Notifications\NotificationListResponse\Data\List_\User
 *
 * @phpstan-type ListShape = array{
 *   id?: int|null,
 *   canGoToProfile?: bool|null,
 *   createdAt?: string|null,
 *   isRead?: bool|null,
 *   replacePairs?: null|ReplacePairs|ReplacePairsShape,
 *   subType?: string|null,
 *   text?: string|null,
 *   type?: string|null,
 *   user?: null|User|UserShape,
 * }
 */
final class List_ implements BaseModel
{
    /** @use SdkModel<ListShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional]
    public ?bool $canGoToProfile;

    #[Optional]
    public ?string $createdAt;

    #[Optional]
    public ?bool $isRead;

    #[Optional]
    public ?ReplacePairs $replacePairs;

    #[Optional]
    public ?string $subType;

    #[Optional]
    public ?string $text;

    #[Optional]
    public ?string $type;

    #[Optional]
    public ?User $user;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ReplacePairs|ReplacePairsShape|null $replacePairs
     * @param User|UserShape|null $user
     */
    public static function with(
        ?int $id = null,
        ?bool $canGoToProfile = null,
        ?string $createdAt = null,
        ?bool $isRead = null,
        ReplacePairs|array|null $replacePairs = null,
        ?string $subType = null,
        ?string $text = null,
        ?string $type = null,
        User|array|null $user = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $canGoToProfile && $self['canGoToProfile'] = $canGoToProfile;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $isRead && $self['isRead'] = $isRead;
        null !== $replacePairs && $self['replacePairs'] = $replacePairs;
        null !== $subType && $self['subType'] = $subType;
        null !== $text && $self['text'] = $text;
        null !== $type && $self['type'] = $type;
        null !== $user && $self['user'] = $user;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCanGoToProfile(bool $canGoToProfile): self
    {
        $self = clone $this;
        $self['canGoToProfile'] = $canGoToProfile;

        return $self;
    }

    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withIsRead(bool $isRead): self
    {
        $self = clone $this;
        $self['isRead'] = $isRead;

        return $self;
    }

    /**
     * @param ReplacePairs|ReplacePairsShape $replacePairs
     */
    public function withReplacePairs(ReplacePairs|array $replacePairs): self
    {
        $self = clone $this;
        $self['replacePairs'] = $replacePairs;

        return $self;
    }

    public function withSubType(string $subType): self
    {
        $self = clone $this;
        $self['subType'] = $subType;

        return $self;
    }

    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param User|UserShape $user
     */
    public function withUser(User|array $user): self
    {
        $self = clone $this;
        $self['user'] = $user;

        return $self;
    }
}
