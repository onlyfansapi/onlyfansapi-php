<?php

declare(strict_types=1);

namespace OnlyFansAPI\SmartLinks;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * List all Smart Links.
 *
 * @see OnlyFansAPI\Services\SmartLinksService::list()
 *
 * @phpstan-type SmartLinkListParamsShape = array{
 *   accountIDs?: string|null,
 *   limit?: int|null,
 *   metaPixelIDs?: string|null,
 *   name?: string|null,
 *   offset?: int|null,
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

    /**
     * The number of Smart Links to return. Default `50`. Must be at least 1. Must not be greater than 1000.
     */
    #[Optional]
    public ?int $limit;

    /**
     * Comma-separated Meta Pixel IDs to include.
     */
    #[Optional(nullable: true)]
    public ?string $metaPixelIDs;

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
        ?string $accountIDs = null,
        ?int $limit = null,
        ?string $metaPixelIDs = null,
        ?string $name = null,
        ?int $offset = null,
    ): self {
        $self = new self;

        null !== $accountIDs && $self['accountIDs'] = $accountIDs;
        null !== $limit && $self['limit'] = $limit;
        null !== $metaPixelIDs && $self['metaPixelIDs'] = $metaPixelIDs;
        null !== $name && $self['name'] = $name;
        null !== $offset && $self['offset'] = $offset;

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
     * The number of Smart Links to return. Default `50`. Must be at least 1. Must not be greater than 1000.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Comma-separated Meta Pixel IDs to include.
     */
    public function withMetaPixelIDs(?string $metaPixelIDs): self
    {
        $self = clone $this;
        $self['metaPixelIDs'] = $metaPixelIDs;

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
}
