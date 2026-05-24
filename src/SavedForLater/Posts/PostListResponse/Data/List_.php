<?php

declare(strict_types=1);

namespace Onlyfansapi\SavedForLater\Posts\PostListResponse\Data;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\SavedForLater\Posts\PostListResponse\Data\List_\Entity;

/**
 * @phpstan-import-type EntityShape from \Onlyfansapi\SavedForLater\Posts\PostListResponse\Data\List_\Entity
 *
 * @phpstan-type ListShape = array{
 *   id?: int|null,
 *   createdDateTime?: string|null,
 *   entity?: null|Entity|EntityShape,
 *   publishDateTime?: string|null,
 *   type?: string|null,
 * }
 */
final class List_ implements BaseModel
{
    /** @use SdkModel<ListShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional]
    public ?string $createdDateTime;

    #[Optional]
    public ?Entity $entity;

    #[Optional(nullable: true)]
    public ?string $publishDateTime;

    #[Optional]
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
     * @param Entity|EntityShape|null $entity
     */
    public static function with(
        ?int $id = null,
        ?string $createdDateTime = null,
        Entity|array|null $entity = null,
        ?string $publishDateTime = null,
        ?string $type = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $createdDateTime && $self['createdDateTime'] = $createdDateTime;
        null !== $entity && $self['entity'] = $entity;
        null !== $publishDateTime && $self['publishDateTime'] = $publishDateTime;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCreatedDateTime(string $createdDateTime): self
    {
        $self = clone $this;
        $self['createdDateTime'] = $createdDateTime;

        return $self;
    }

    /**
     * @param Entity|EntityShape $entity
     */
    public function withEntity(Entity|array $entity): self
    {
        $self = clone $this;
        $self['entity'] = $entity;

        return $self;
    }

    public function withPublishDateTime(?string $publishDateTime): self
    {
        $self = clone $this;
        $self['publishDateTime'] = $publishDateTime;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
