<?php

declare(strict_types=1);

namespace OnlyFansAPI\Media\Vault\Lists\ListListResponse\UnionMember1;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Media\Vault\Lists\ListListResponse\UnionMember1\Data\All;
use OnlyFansAPI\Media\Vault\Lists\ListListResponse\UnionMember1\Data\List_;

/**
 * @phpstan-import-type AllShape from \OnlyFansAPI\Media\Vault\Lists\ListListResponse\UnionMember1\Data\All
 * @phpstan-import-type ListShape from \OnlyFansAPI\Media\Vault\Lists\ListListResponse\UnionMember1\Data\List_
 *
 * @phpstan-type DataShape = array{
 *   all?: null|All|AllShape,
 *   canCreateVaultLists?: bool|null,
 *   hasMore?: bool|null,
 *   list?: list<List_|ListShape>|null,
 *   order?: string|null,
 *   sort?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?All $all;

    #[Optional]
    public ?bool $canCreateVaultLists;

    #[Optional]
    public ?bool $hasMore;

    /** @var list<List_>|null $list */
    #[Optional(list: List_::class)]
    public ?array $list;

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
     * @param All|AllShape|null $all
     * @param list<List_|ListShape>|null $list
     */
    public static function with(
        All|array|null $all = null,
        ?bool $canCreateVaultLists = null,
        ?bool $hasMore = null,
        ?array $list = null,
        ?string $order = null,
        ?string $sort = null,
    ): self {
        $self = new self;

        null !== $all && $self['all'] = $all;
        null !== $canCreateVaultLists && $self['canCreateVaultLists'] = $canCreateVaultLists;
        null !== $hasMore && $self['hasMore'] = $hasMore;
        null !== $list && $self['list'] = $list;
        null !== $order && $self['order'] = $order;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    /**
     * @param All|AllShape $all
     */
    public function withAll(All|array $all): self
    {
        $self = clone $this;
        $self['all'] = $all;

        return $self;
    }

    public function withCanCreateVaultLists(bool $canCreateVaultLists): self
    {
        $self = clone $this;
        $self['canCreateVaultLists'] = $canCreateVaultLists;

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
