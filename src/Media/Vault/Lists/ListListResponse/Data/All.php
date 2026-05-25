<?php

declare(strict_types=1);

namespace OnlyFansAPI\Media\Vault\Lists\ListListResponse\Data;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Media\Vault\Lists\ListListResponse\Data\All\Media;

/**
 * @phpstan-import-type MediaShape from \OnlyFansAPI\Media\Vault\Lists\ListListResponse\Data\All\Media
 *
 * @phpstan-type AllShape = array{
 *   audiosCount?: int|null,
 *   gifsCount?: int|null,
 *   medias?: list<Media|MediaShape>|null,
 *   photosCount?: int|null,
 *   videosCount?: int|null,
 * }
 */
final class All implements BaseModel
{
    /** @use SdkModel<AllShape> */
    use SdkModel;

    #[Optional]
    public ?int $audiosCount;

    #[Optional]
    public ?int $gifsCount;

    /** @var list<Media>|null $medias */
    #[Optional(list: Media::class)]
    public ?array $medias;

    #[Optional]
    public ?int $photosCount;

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
     * @param list<Media|MediaShape>|null $medias
     */
    public static function with(
        ?int $audiosCount = null,
        ?int $gifsCount = null,
        ?array $medias = null,
        ?int $photosCount = null,
        ?int $videosCount = null,
    ): self {
        $self = new self;

        null !== $audiosCount && $self['audiosCount'] = $audiosCount;
        null !== $gifsCount && $self['gifsCount'] = $gifsCount;
        null !== $medias && $self['medias'] = $medias;
        null !== $photosCount && $self['photosCount'] = $photosCount;
        null !== $videosCount && $self['videosCount'] = $videosCount;

        return $self;
    }

    public function withAudiosCount(int $audiosCount): self
    {
        $self = clone $this;
        $self['audiosCount'] = $audiosCount;

        return $self;
    }

    public function withGifsCount(int $gifsCount): self
    {
        $self = clone $this;
        $self['gifsCount'] = $gifsCount;

        return $self;
    }

    /**
     * @param list<Media|MediaShape> $medias
     */
    public function withMedias(array $medias): self
    {
        $self = clone $this;
        $self['medias'] = $medias;

        return $self;
    }

    public function withPhotosCount(int $photosCount): self
    {
        $self = clone $this;
        $self['photosCount'] = $photosCount;

        return $self;
    }

    public function withVideosCount(int $videosCount): self
    {
        $self = clone $this;
        $self['videosCount'] = $videosCount;

        return $self;
    }
}
