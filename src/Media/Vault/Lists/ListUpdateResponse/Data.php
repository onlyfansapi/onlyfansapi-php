<?php

declare(strict_types=1);

namespace OnlyFansAPI\Media\Vault\Lists\ListUpdateResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id?: int|null,
 *   audiosCount?: int|null,
 *   canDelete?: bool|null,
 *   canUpdate?: bool|null,
 *   gifsCount?: int|null,
 *   hasMedia?: bool|null,
 *   medias?: list<mixed>|null,
 *   name?: string|null,
 *   photosCount?: int|null,
 *   type?: string|null,
 *   videosCount?: int|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional]
    public ?int $audiosCount;

    #[Optional]
    public ?bool $canDelete;

    #[Optional]
    public ?bool $canUpdate;

    #[Optional]
    public ?int $gifsCount;

    #[Optional]
    public ?bool $hasMedia;

    /** @var list<mixed>|null $medias */
    #[Optional(list: 'mixed')]
    public ?array $medias;

    #[Optional]
    public ?string $name;

    #[Optional]
    public ?int $photosCount;

    #[Optional]
    public ?string $type;

    #[Optional]
    public ?int $videosCount;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<mixed>|null $medias
     */
    public static function with(
        ?int $id = null,
        ?int $audiosCount = null,
        ?bool $canDelete = null,
        ?bool $canUpdate = null,
        ?int $gifsCount = null,
        ?bool $hasMedia = null,
        ?array $medias = null,
        ?string $name = null,
        ?int $photosCount = null,
        ?string $type = null,
        ?int $videosCount = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $audiosCount && $self['audiosCount'] = $audiosCount;
        null !== $canDelete && $self['canDelete'] = $canDelete;
        null !== $canUpdate && $self['canUpdate'] = $canUpdate;
        null !== $gifsCount && $self['gifsCount'] = $gifsCount;
        null !== $hasMedia && $self['hasMedia'] = $hasMedia;
        null !== $medias && $self['medias'] = $medias;
        null !== $name && $self['name'] = $name;
        null !== $photosCount && $self['photosCount'] = $photosCount;
        null !== $type && $self['type'] = $type;
        null !== $videosCount && $self['videosCount'] = $videosCount;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withAudiosCount(int $audiosCount): self
    {
        $self = clone $this;
        $self['audiosCount'] = $audiosCount;

        return $self;
    }

    public function withCanDelete(bool $canDelete): self
    {
        $self = clone $this;
        $self['canDelete'] = $canDelete;

        return $self;
    }

    public function withCanUpdate(bool $canUpdate): self
    {
        $self = clone $this;
        $self['canUpdate'] = $canUpdate;

        return $self;
    }

    public function withGifsCount(int $gifsCount): self
    {
        $self = clone $this;
        $self['gifsCount'] = $gifsCount;

        return $self;
    }

    public function withHasMedia(bool $hasMedia): self
    {
        $self = clone $this;
        $self['hasMedia'] = $hasMedia;

        return $self;
    }

    /**
     * @param list<mixed> $medias
     */
    public function withMedias(array $medias): self
    {
        $self = clone $this;
        $self['medias'] = $medias;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withPhotosCount(int $photosCount): self
    {
        $self = clone $this;
        $self['photosCount'] = $photosCount;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    public function withVideosCount(int $videosCount): self
    {
        $self = clone $this;
        $self['videosCount'] = $videosCount;

        return $self;
    }
}
