<?php

declare(strict_types=1);

namespace Onlyfansapi\Payouts\PayoutListTransactionsResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Payouts\PayoutListTransactionsResponse\Data\List_;

/**
 * @phpstan-import-type ListShape from \Onlyfansapi\Payouts\PayoutListTransactionsResponse\Data\List_
 *
 * @phpstan-type DataShape = array{
 *   hasMore?: bool|null,
 *   list?: list<List_|ListShape>|null,
 *   marker?: int|null,
 *   nextMarker?: int|null,
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

    #[Optional]
    public ?int $marker;

    #[Optional]
    public ?int $nextMarker;

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
        ?int $marker = null,
        ?int $nextMarker = null,
    ): self {
        $self = new self;

        null !== $hasMore && $self['hasMore'] = $hasMore;
        null !== $list && $self['list'] = $list;
        null !== $marker && $self['marker'] = $marker;
        null !== $nextMarker && $self['nextMarker'] = $nextMarker;

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

    public function withMarker(int $marker): self
    {
        $self = clone $this;
        $self['marker'] = $marker;

        return $self;
    }

    public function withNextMarker(int $nextMarker): self
    {
        $self = clone $this;
        $self['nextMarker'] = $nextMarker;

        return $self;
    }
}
