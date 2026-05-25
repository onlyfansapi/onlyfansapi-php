<?php

declare(strict_types=1);

namespace OnlyFansAPI\LinkTags;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\LinkTags\LinkTagListParams\Type;

/**
 * Get all existing tags that have been used on free trial links and/or tracking links for this account. This is a free endpoint.
 *
 * @see OnlyFansAPI\Services\LinkTagsService::list()
 *
 * @phpstan-type LinkTagListParamsShape = array{type?: null|Type|value-of<Type>}
 */
final class LinkTagListParams implements BaseModel
{
    /** @use SdkModel<LinkTagListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter by link type. If not provided, returns tags for both types.
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
     * @param Type|value-of<Type>|null $type
     */
    public static function with(Type|string|null $type = null): self
    {
        $self = new self;

        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * Filter by link type. If not provided, returns tags for both types.
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
