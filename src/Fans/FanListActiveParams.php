<?php

declare(strict_types=1);

namespace Onlyfansapi\Fans;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Fans\FanListActiveParams\Filter;
use Onlyfansapi\Fans\FanListActiveParams\Type;

/**
 * Get a paginated list of fans for an Account. Newest fans are first.
 *
 * @see Onlyfansapi\Services\FansService::listActive()
 *
 * @phpstan-import-type FilterShape from \Onlyfansapi\Fans\FanListActiveParams\Filter
 *
 * @phpstan-type FanListActiveParamsShape = array{
 *   filter?: null|Filter|FilterShape,
 *   limit?: int|null,
 *   offset?: int|null,
 *   query?: string|null,
 *   type?: null|Type|value-of<Type>,
 * }
 */
final class FanListActiveParams implements BaseModel
{
    /** @use SdkModel<FanListActiveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?Filter $filter;

    /**
     * Number of fans to return (1-50). Must be at least 1. Must not be greater than 20.
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
     * Number of fans to return (1-50). Must be at least 1. Must not be greater than 20.
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
