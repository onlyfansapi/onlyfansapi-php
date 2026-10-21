<?php

declare(strict_types=1);

namespace OnlyFansAPI\Engagement\Messages\MessageGetTopMessageResponse\Data\Purchases\Media;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Engagement\Messages\MessageGetTopMessageResponse\Data\Purchases\Media\Files\Full;
use OnlyFansAPI\Engagement\Messages\MessageGetTopMessageResponse\Data\Purchases\Media\Files\Preview;
use OnlyFansAPI\Engagement\Messages\MessageGetTopMessageResponse\Data\Purchases\Media\Files\SquarePreview;
use OnlyFansAPI\Engagement\Messages\MessageGetTopMessageResponse\Data\Purchases\Media\Files\Thumb;

/**
 * @phpstan-import-type FullShape from \OnlyFansAPI\Engagement\Messages\MessageGetTopMessageResponse\Data\Purchases\Media\Files\Full
 * @phpstan-import-type PreviewShape from \OnlyFansAPI\Engagement\Messages\MessageGetTopMessageResponse\Data\Purchases\Media\Files\Preview
 * @phpstan-import-type SquarePreviewShape from \OnlyFansAPI\Engagement\Messages\MessageGetTopMessageResponse\Data\Purchases\Media\Files\SquarePreview
 * @phpstan-import-type ThumbShape from \OnlyFansAPI\Engagement\Messages\MessageGetTopMessageResponse\Data\Purchases\Media\Files\Thumb
 *
 * @phpstan-type FilesShape = array{
 *   full?: null|Full|FullShape,
 *   preview?: null|Preview|PreviewShape,
 *   squarePreview?: null|SquarePreview|SquarePreviewShape,
 *   thumb?: null|Thumb|ThumbShape,
 * }
 */
final class Files implements BaseModel
{
    /** @use SdkModel<FilesShape> */
    use SdkModel;

    #[Optional]
    public ?Full $full;

    #[Optional]
    public ?Preview $preview;

    #[Optional]
    public ?SquarePreview $squarePreview;

    #[Optional]
    public ?Thumb $thumb;

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
     * @param Preview|PreviewShape|null $preview
     * @param SquarePreview|SquarePreviewShape|null $squarePreview
     * @param Thumb|ThumbShape|null $thumb
     */
    public static function with(
        Full|array|null $full = null,
        Preview|array|null $preview = null,
        SquarePreview|array|null $squarePreview = null,
        Thumb|array|null $thumb = null,
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

    /**
     * @param Preview|PreviewShape $preview
     */
    public function withPreview(Preview|array $preview): self
    {
        $self = clone $this;
        $self['preview'] = $preview;

        return $self;
    }

    /**
     * @param SquarePreview|SquarePreviewShape $squarePreview
     */
    public function withSquarePreview(SquarePreview|array $squarePreview): self
    {
        $self = clone $this;
        $self['squarePreview'] = $squarePreview;

        return $self;
    }

    /**
     * @param Thumb|ThumbShape $thumb
     */
    public function withThumb(Thumb|array $thumb): self
    {
        $self = clone $this;
        $self['thumb'] = $thumb;

        return $self;
    }
}
