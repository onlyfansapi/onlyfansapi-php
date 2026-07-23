<?php

declare(strict_types=1);

namespace OnlyFansAPI\Fans;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Fans\FanListAllParams\Filter;
use OnlyFansAPI\Fans\FanListAllParams\Type;

/**
 * Get a paginated list of fans for an Account. Newest fans are first. Paginate by following `_pagination.next_page` until it is null (`data.hasMore` is the authoritative flag). Do NOT use the page's item count to detect the last page — OnlyFans occasionally returns fewer than `limit` items (e.g. 19 for limit=20) on a non-final page because it filters entries server-side; no fans are skipped.
 *
 * @see OnlyFansAPI\Services\FansService::listAll()
 *
 * @phpstan-import-type FilterShape from \OnlyFansAPI\Fans\FanListAllParams\Filter
 *
 * @phpstan-type FanListAllParamsShape = array{
 *   filter?: null|Filter|FilterShape,
 *   limit?: int|null,
 *   offset?: int|null,
 *   query?: string|null,
 *   type?: null|Type|value-of<Type>,
 * }
 */
final class FanListAllParams implements BaseModel
{
    /** @use SdkModel<FanListAllParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?Filter $filter;

    /**
     * Number of fans to return (1-20). OnlyFans does not allow more than 20 per page. Must be at least 1. Must not be greater than 20.
     */
    #[Optional]
    public ?int $limit;

    /**
     * Number of fans to skip. Must be at least 0.
     */
    #[Optional]
    public ?int $offset;

    /**
     * Search within fan name/username.
     */
    #[Optional(nullable: true)]
    public ?string $query;

    /**
     * Filter by fan type.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
    public ?string $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Filter|FilterShape|null $filter
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        Filter|array|null $filter = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $query = null,
        Type|string|null $type = null,
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $limit && $self['limit'] = $limit;
        null !== $offset && $self['offset'] = $offset;
        null !== $query && $self['query'] = $query;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * @param Filter|FilterShape $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }

    /**
     * Number of fans to return (1-20). OnlyFans does not allow more than 20 per page. Must be at least 1. Must not be greater than 20.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Number of fans to skip. Must be at least 0.
     */
    public function withOffset(int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }

    /**
     * Search within fan name/username.
     */
    public function withQuery(?string $query): self
    {
        $self = clone $this;
        $self['query'] = $query;

        return $self;
    }

    /**
     * Filter by fan type.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
