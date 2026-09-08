<?php

declare(strict_types=1);

namespace OnlyFansAPI\SmartLinks;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\SmartLinks\SmartLinkListParams\Filter;

/**
 * List all Smart Links.
 *
 * @see OnlyFansAPI\Services\SmartLinksService::list()
 *
 * @phpstan-import-type FilterShape from \OnlyFansAPI\SmartLinks\SmartLinkListParams\Filter
 *
 * @phpstan-type SmartLinkListParamsShape = array{
 *   accountIDs?: string|null,
 *   filter?: null|Filter|FilterShape,
 *   limit?: int|null,
 *   name?: string|null,
 *   offset?: int|null,
 *   pixelIDs?: string|null,
 * }
 */
final class SmartLinkListParams implements BaseModel
{
    /** @use SdkModel<SmartLinkListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Comma-separated account prefixed IDs to include.
     */
    #[Optional(nullable: true)]
    public ?string $accountIDs;

    #[Optional]
    public ?Filter $filter;

    /**
     * The number of Smart Links to return. Default `50`. Must be at least 1. Must not be greater than 1000.
     */
    #[Optional]
    public ?int $limit;

    /**
     * Filter Smart Links by name. Must not be greater than 255 characters.
     */
    #[Optional(nullable: true)]
    public ?string $name;

    /**
     * The offset used for pagination. Default `0`. Must be at least 0.
     */
    #[Optional]
    public ?int $offset;

    /**
     * Comma-separated ad platform Pixel IDs to include.
     */
    #[Optional(nullable: true)]
    public ?string $pixelIDs;

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
        ?string $accountIDs = null,
        Filter|array|null $filter = null,
        ?int $limit = null,
        ?string $name = null,
        ?int $offset = null,
        ?string $pixelIDs = null,
    ): self {
        $self = new self;

        null !== $accountIDs && $self['accountIDs'] = $accountIDs;
        null !== $filter && $self['filter'] = $filter;
        null !== $limit && $self['limit'] = $limit;
        null !== $name && $self['name'] = $name;
        null !== $offset && $self['offset'] = $offset;
        null !== $pixelIDs && $self['pixelIDs'] = $pixelIDs;

        return $self;
    }

    /**
     * Comma-separated account prefixed IDs to include.
     */
    public function withAccountIDs(?string $accountIDs): self
    {
        $self = clone $this;
        $self['accountIDs'] = $accountIDs;

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
     * The number of Smart Links to return. Default `50`. Must be at least 1. Must not be greater than 1000.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Filter Smart Links by name. Must not be greater than 255 characters.
     */
    public function withName(?string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The offset used for pagination. Default `0`. Must be at least 0.
     */
    public function withOffset(int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }

    /**
     * Comma-separated ad platform Pixel IDs to include.
     */
    public function withPixelIDs(?string $pixelIDs): self
    {
        $self = clone $this;
        $self['pixelIDs'] = $pixelIDs;

        return $self;
    }
}
