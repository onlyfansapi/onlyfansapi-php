<?php

declare(strict_types=1);

namespace OnlyFansAPI\Posts\PostUnarchiveResponse\Data;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type CountersShape = array{
 *   archivedPostsCount?: int|null,
 *   audiosCount?: int|null,
 *   mediasCount?: int|null,
 *   photosCount?: int|null,
 *   postsCount?: int|null,
 *   privateArchivedPostsCount?: int|null,
 *   streamsCount?: int|null,
 *   videosCount?: int|null,
 * }
 */
final class Counters implements BaseModel
{
    /** @use SdkModel<CountersShape> */
    use SdkModel;

    #[Optional]
    public ?int $archivedPostsCount;

    #[Optional]
    public ?int $audiosCount;

    #[Optional]
    public ?int $mediasCount;

    #[Optional]
    public ?int $photosCount;

    #[Optional]
    public ?int $postsCount;

    #[Optional]
    public ?int $privateArchivedPostsCount;

    #[Optional]
    public ?int $streamsCount;

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
     */
    public static function with(
        ?int $archivedPostsCount = null,
        ?int $audiosCount = null,
        ?int $mediasCount = null,
        ?int $photosCount = null,
        ?int $postsCount = null,
        ?int $privateArchivedPostsCount = null,
        ?int $streamsCount = null,
        ?int $videosCount = null,
    ): self {
        $self = new self;

        null !== $archivedPostsCount && $self['archivedPostsCount'] = $archivedPostsCount;
        null !== $audiosCount && $self['audiosCount'] = $audiosCount;
        null !== $mediasCount && $self['mediasCount'] = $mediasCount;
        null !== $photosCount && $self['photosCount'] = $photosCount;
        null !== $postsCount && $self['postsCount'] = $postsCount;
        null !== $privateArchivedPostsCount && $self['privateArchivedPostsCount'] = $privateArchivedPostsCount;
        null !== $streamsCount && $self['streamsCount'] = $streamsCount;
        null !== $videosCount && $self['videosCount'] = $videosCount;

        return $self;
    }

    public function withArchivedPostsCount(int $archivedPostsCount): self
    {
        $self = clone $this;
        $self['archivedPostsCount'] = $archivedPostsCount;

        return $self;
    }

    public function withAudiosCount(int $audiosCount): self
    {
        $self = clone $this;
        $self['audiosCount'] = $audiosCount;

        return $self;
    }

    public function withMediasCount(int $mediasCount): self
    {
        $self = clone $this;
        $self['mediasCount'] = $mediasCount;

        return $self;
    }

    public function withPhotosCount(int $photosCount): self
    {
        $self = clone $this;
        $self['photosCount'] = $photosCount;

        return $self;
    }

    public function withPostsCount(int $postsCount): self
    {
        $self = clone $this;
        $self['postsCount'] = $postsCount;

        return $self;
    }

    public function withPrivateArchivedPostsCount(
        int $privateArchivedPostsCount
    ): self {
        $self = clone $this;
        $self['privateArchivedPostsCount'] = $privateArchivedPostsCount;

        return $self;
    }

    public function withStreamsCount(int $streamsCount): self
    {
        $self = clone $this;
        $self['streamsCount'] = $streamsCount;

        return $self;
    }

    public function withVideosCount(int $videosCount): self
    {
        $self = clone $this;
        $self['videosCount'] = $videosCount;

        return $self;
    }
}
