<?php

declare(strict_types=1);

namespace OnlyFansAPI\Chats\ChatListMediaResponse;

use OnlyFansAPI\Chats\ChatListMediaResponse\Data\List_;
use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ListShape from \OnlyFansAPI\Chats\ChatListMediaResponse\Data\List_
 *
 * @phpstan-type DataShape = array{
 *   hasMore?: bool|null,
 *   list?: list<List_|ListShape>|null,
 *   nextLastID?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?bool $hasMore;

    /** @var list<List_>|null $list */
    #[Optional(list: List_::class)]
    public ?array $list;

    #[Optional('nextLastId')]
    public ?string $nextLastID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<List_|ListShape>|null $list
     */
    public static function with(
        ?bool $hasMore = null,
        ?array $list = null,
        ?string $nextLastID = null
    ): self {
        $self = new self;

        null !== $hasMore && $self['hasMore'] = $hasMore;
        null !== $list && $self['list'] = $list;
        null !== $nextLastID && $self['nextLastID'] = $nextLastID;

        return $self;
    }

    public function withHasMore(bool $hasMore): self
    {
        $self = clone $this;
        $self['hasMore'] = $hasMore;

        return $self;
    }

    /**
     * @param list<List_|ListShape> $list
     */
    public function withList(array $list): self
    {
        $self = clone $this;
        $self['list'] = $list;

        return $self;
    }

    public function withNextLastID(string $nextLastID): self
    {
        $self = clone $this;
        $self['nextLastID'] = $nextLastID;

        return $self;
    }
}
