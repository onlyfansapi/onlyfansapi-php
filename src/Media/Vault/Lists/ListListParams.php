<?php

declare(strict_types=1);

namespace Onlyfansapi\Media\Vault\Lists;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * List your Vault lists (categories).
 *
 * @see Onlyfansapi\Services\Media\Vault\ListsService::list()
 *
 * @phpstan-type ListListParamsShape = array{
 *   limit?: int|null, offset?: int|null, query?: string|null
 * }
 */
final class ListListParams implements BaseModel
{
    /** @use SdkModel<ListListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Number of media to return per page. Default: `24`.
     */
    #[Optional]
    public ?int $limit;

    /**
     * The offset used for pagination. Default `0`.
     */
    #[Optional]
    public ?int $offset;

    /**
     * Optionally, find a list by its name.
     */
    #[Optional]
    public ?string $query;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?int $limit = null,
        ?int $offset = null,
        ?string $query = null
    ): self {
        $self = new self;

        null !== $limit && $self['limit'] = $limit;
        null !== $offset && $self['offset'] = $offset;
        null !== $query && $self['query'] = $query;

        return $self;
    }

    /**
     * Number of media to return per page. Default: `24`.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * The offset used for pagination. Default `0`.
     */
    public function withOffset(int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }

    /**
     * Optionally, find a list by its name.
     */
    public function withQuery(string $query): self
    {
        $self = clone $this;
        $self['query'] = $query;

        return $self;
    }
}
