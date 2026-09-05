<?php

declare(strict_types=1);

namespace OnlyFansAPI\Stories\StoryListActiveResponse\Data\Media\Files;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Stories\StoryListActiveResponse\Data\Media\Files\Preview\Sources;

/**
 * @phpstan-import-type SourcesShape from \OnlyFansAPI\Stories\StoryListActiveResponse\Data\Media\Files\Preview\Sources
 *
 * @phpstan-type PreviewShape = array{
 *   height?: int|null,
 *   size?: int|null,
 *   sources?: null|Sources|SourcesShape,
 *   url?: string|null,
 *   width?: int|null,
 * }
 */
final class Preview implements BaseModel
{
    /** @use SdkModel<PreviewShape> */
    use SdkModel;

    #[Optional]
    public ?int $height;

    #[Optional]
    public ?int $size;

    #[Optional]
    public ?Sources $sources;

    #[Optional]
    public ?string $url;

    #[Optional]
    public ?int $width;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Sources|SourcesShape|null $sources
     */
    public static function with(
        ?int $height = null,
        ?int $size = null,
        Sources|array|null $sources = null,
        ?string $url = null,
        ?int $width = null,
    ): self {
        $self = new self;

        null !== $height && $self['height'] = $height;
        null !== $size && $self['size'] = $size;
        null !== $sources && $self['sources'] = $sources;
        null !== $url && $self['url'] = $url;
        null !== $width && $self['width'] = $width;

        return $self;
    }

    public function withHeight(int $height): self
    {
        $self = clone $this;
        $self['height'] = $height;

        return $self;
    }

    public function withSize(int $size): self
    {
        $self = clone $this;
        $self['size'] = $size;

        return $self;
    }

    /**
     * @param Sources|SourcesShape $sources
     */
    public function withSources(Sources|array $sources): self
    {
        $self = clone $this;
        $self['sources'] = $sources;

        return $self;
    }

    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }

    public function withWidth(int $width): self
    {
        $self = clone $this;
        $self['width'] = $width;

        return $self;
    }
}
