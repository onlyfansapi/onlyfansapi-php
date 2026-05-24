<?php

declare(strict_types=1);

namespace Onlyfansapi\Posts\PostNewResponse\Data\Media;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Posts\PostNewResponse\Data\Media\Files\Full;

/**
 * @phpstan-import-type FullShape from \Onlyfansapi\Posts\PostNewResponse\Data\Media\Files\Full
 *
 * @phpstan-type FilesShape = array{
 *   full?: null|Full|FullShape,
 *   preview?: string|null,
 *   squarePreview?: string|null,
 *   thumb?: string|null,
 * }
 */
final class Files implements BaseModel
{
    /** @use SdkModel<FilesShape> */
    use SdkModel;

    #[Optional]
    public ?Full $full;

    #[Optional]
    public ?string $preview;

    #[Optional]
    public ?string $squarePreview;

    #[Optional]
    public ?string $thumb;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Full|FullShape|null $full
     */
    public static function with(
        Full|array|null $full = null,
        ?string $preview = null,
        ?string $squarePreview = null,
        ?string $thumb = null,
    ): self {
        $self = new self;

        null !== $full && $self['full'] = $full;
        null !== $preview && $self['preview'] = $preview;
        null !== $squarePreview && $self['squarePreview'] = $squarePreview;
        null !== $thumb && $self['thumb'] = $thumb;

        return $self;
    }

    /**
     * @param Full|FullShape $full
     */
    public function withFull(Full|array $full): self
    {
        $self = clone $this;
        $self['full'] = $full;

        return $self;
    }

    public function withPreview(string $preview): self
    {
        $self = clone $this;
        $self['preview'] = $preview;

        return $self;
    }

    public function withSquarePreview(string $squarePreview): self
    {
        $self = clone $this;
        $self['squarePreview'] = $squarePreview;

        return $self;
    }

    public function withThumb(string $thumb): self
    {
        $self = clone $this;
        $self['thumb'] = $thumb;

        return $self;
    }
}
