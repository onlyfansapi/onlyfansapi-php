<?php

declare(strict_types=1);

namespace OnlyFansAPI\Posts\Labels\LabelListResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Posts\Labels\LabelListResponse\Data\List_;

/**
 * @phpstan-import-type ListShape from \OnlyFansAPI\Posts\Labels\LabelListResponse\Data\List_
 *
 * @phpstan-type DataShape = array{
 *   hashSort?: string|null,
 *   hasMore?: bool|null,
 *   list?: list<List_|ListShape>|null,
 *   nextOffset?: int|null,
 *   order?: string|null,
 *   sort?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $hashSort;

    #[Optional]
    public ?bool $hasMore;

    /** @var list<List_>|null $list */
    #[Optional(list: List_::class)]
    public ?array $list;

    #[Optional]
    public ?int $nextOffset;

    #[Optional]
    public ?string $order;

    #[Optional]
    public ?string $sort;

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
        ?string $hashSort = null,
        ?bool $hasMore = null,
        ?array $list = null,
        ?int $nextOffset = null,
        ?string $order = null,
        ?string $sort = null,
    ): self {
        $self = new self;

        null !== $hashSort && $self['hashSort'] = $hashSort;
        null !== $hasMore && $self['hasMore'] = $hasMore;
        null !== $list && $self['list'] = $list;
        null !== $nextOffset && $self['nextOffset'] = $nextOffset;
        null !== $order && $self['order'] = $order;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    public function withHashSort(string $hashSort): self
    {
        $self = clone $this;
        $self['hashSort'] = $hashSort;

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

    public function withNextOffset(int $nextOffset): self
    {
        $self = clone $this;
        $self['nextOffset'] = $nextOffset;

        return $self;
    }

    public function withOrder(string $order): self
    {
        $self = clone $this;
        $self['order'] = $order;

        return $self;
    }

    public function withSort(string $sort): self
    {
        $self = clone $this;
        $self['sort'] = $sort;

        return $self;
    }
}
