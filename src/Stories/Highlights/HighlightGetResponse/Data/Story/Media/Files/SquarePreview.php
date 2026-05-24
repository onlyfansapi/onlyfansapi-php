<?php

declare(strict_types=1);

namespace Onlyfansapi\Stories\Highlights\HighlightGetResponse\Data\Story\Media\Files;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Stories\Highlights\HighlightGetResponse\Data\Story\Media\Files\SquarePreview\Sources;

/**
 * @phpstan-import-type SourcesShape from \Onlyfansapi\Stories\Highlights\HighlightGetResponse\Data\Story\Media\Files\SquarePreview\Sources
 *
 * @phpstan-type SquarePreviewShape = array{
 *   height?: int|null,
 *   size?: int|null,
 *   sources?: null|Sources|SourcesShape,
 *   url?: string|null,
 *   width?: int|null,
 * }
 */
final class SquarePreview implements BaseModel
{
    /** @use SdkModel<SquarePreviewShape> */
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
