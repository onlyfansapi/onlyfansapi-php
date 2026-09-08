<?php

declare(strict_types=1);

namespace OnlyFansAPI\Media\Vault\Lists\ListListResponse\UnionMember1\Data;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type ListShape = array{
 *   id?: int|null,
 *   canUpdate?: bool|null,
 *   mediaCount?: int|null,
 *   name?: string|null,
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
    public ?bool $canUpdate;

    #[Optional]
    public ?int $mediaCount;

    #[Optional]
    public ?string $name;

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
     */
    public static function with(
        ?int $id = null,
        ?bool $canUpdate = null,
        ?int $mediaCount = null,
        ?string $name = null,
        ?string $type = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $canUpdate && $self['canUpdate'] = $canUpdate;
        null !== $mediaCount && $self['mediaCount'] = $mediaCount;
        null !== $name && $self['name'] = $name;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCanUpdate(bool $canUpdate): self
    {
        $self = clone $this;
        $self['canUpdate'] = $canUpdate;

        return $self;
    }

    public function withMediaCount(int $mediaCount): self
    {
        $self = clone $this;
        $self['mediaCount'] = $mediaCount;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
