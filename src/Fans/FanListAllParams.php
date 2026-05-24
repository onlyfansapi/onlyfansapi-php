<?php

declare(strict_types=1);

namespace Onlyfansapi\Fans;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Fans\FanListAllParams\Filter;

/**
 * Get a paginated list of fans for an Account. Newest fans are first.
 *
 * @see Onlyfansapi\Services\FansService::listAll()
 *
 * @phpstan-import-type FilterShape from \Onlyfansapi\Fans\FanListAllParams\Filter
 *
 * @phpstan-type FanListAllParamsShape = array{
 *   filter?: null|Filter|FilterShape,
 *   limit?: string|null,
 *   offset?: string|null,
 *   type?: string|null,
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
     * Number of fans to return (1-50).
     */
    #[Optional(nullable: true)]
    public ?string $limit;

    /**
     * Number of fans to skip.
     */
    #[Optional(nullable: true)]
    public ?string $offset;

    /**
     * Filter by fan type.
     */
    #[Optional(nullable: true)]
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
     */
    public static function with(
        Filter|array|null $filter = null,
        ?string $limit = null,
        ?string $offset = null,
        ?string $type = null,
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $limit && $self['limit'] = $limit;
        null !== $offset && $self['offset'] = $offset;
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
     * Number of fans to return (1-50).
     */
    public function withLimit(?string $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Number of fans to skip.
     */
    public function withOffset(?string $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }

    /**
     * Filter by fan type.
     */
    public function withType(?string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
