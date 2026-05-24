<?php

declare(strict_types=1);

namespace Onlyfansapi\Posts\PostListResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Posts\PostListResponse\Data\Counters;
use Onlyfansapi\Posts\PostListResponse\Data\List_;

/**
 * @phpstan-import-type CountersShape from \Onlyfansapi\Posts\PostListResponse\Data\Counters
 * @phpstan-import-type ListShape from \Onlyfansapi\Posts\PostListResponse\Data\List_
 *
 * @phpstan-type DataShape = array{
 *   counters?: null|Counters|CountersShape,
 *   hasMore?: bool|null,
 *   headMarker?: string|null,
 *   list?: list<List_|ListShape>|null,
 *   tailMarker?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?Counters $counters;

    #[Optional]
    public ?bool $hasMore;

    #[Optional]
    public ?string $headMarker;

    /** @var list<List_>|null $list */
    #[Optional(list: List_::class)]
    public ?array $list;

    #[Optional]
    public ?string $tailMarker;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Counters|CountersShape|null $counters
     * @param list<List_|ListShape>|null $list
     */
    public static function with(
        Counters|array|null $counters = null,
        ?bool $hasMore = null,
        ?string $headMarker = null,
        ?array $list = null,
        ?string $tailMarker = null,
    ): self {
        $self = new self;

        null !== $counters && $self['counters'] = $counters;
        null !== $hasMore && $self['hasMore'] = $hasMore;
        null !== $headMarker && $self['headMarker'] = $headMarker;
        null !== $list && $self['list'] = $list;
        null !== $tailMarker && $self['tailMarker'] = $tailMarker;

        return $self;
    }

    /**
     * @param Counters|CountersShape $counters
     */
    public function withCounters(Counters|array $counters): self
    {
        $self = clone $this;
        $self['counters'] = $counters;

        return $self;
    }

    public function withHasMore(bool $hasMore): self
    {
        $self = clone $this;
        $self['hasMore'] = $hasMore;

        return $self;
    }

    public function withHeadMarker(string $headMarker): self
    {
        $self = clone $this;
        $self['headMarker'] = $headMarker;

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

    public function withTailMarker(string $tailMarker): self
    {
        $self = clone $this;
        $self['tailMarker'] = $tailMarker;

        return $self;
    }
}
