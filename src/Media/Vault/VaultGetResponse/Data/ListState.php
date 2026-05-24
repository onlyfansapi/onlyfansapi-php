<?php

declare(strict_types=1);

namespace Onlyfansapi\Media\Vault\VaultGetResponse\Data;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type ListStateShape = array{
 *   id?: int|null,
 *   canAddMedia?: bool|null,
 *   hasMedia?: bool|null,
 *   name?: string|null,
 *   type?: string|null,
 * }
 */
final class ListState implements BaseModel
{
    /** @use SdkModel<ListStateShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional]
    public ?bool $canAddMedia;

    #[Optional]
    public ?bool $hasMedia;

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
        ?bool $canAddMedia = null,
        ?bool $hasMedia = null,
        ?string $name = null,
        ?string $type = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $canAddMedia && $self['canAddMedia'] = $canAddMedia;
        null !== $hasMedia && $self['hasMedia'] = $hasMedia;
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

    public function withCanAddMedia(bool $canAddMedia): self
    {
        $self = clone $this;
        $self['canAddMedia'] = $canAddMedia;

        return $self;
    }

    public function withHasMedia(bool $hasMedia): self
    {
        $self = clone $this;
        $self['hasMedia'] = $hasMedia;

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
