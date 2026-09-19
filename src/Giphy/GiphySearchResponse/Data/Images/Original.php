<?php

declare(strict_types=1);

namespace OnlyFansAPI\Giphy\GiphySearchResponse\Data\Images;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type OriginalShape = array{
 *   height?: string|null,
 *   mp4?: string|null,
 *   url?: string|null,
 *   webp?: string|null,
 *   width?: string|null,
 * }
 */
final class Original implements BaseModel
{
    /** @use SdkModel<OriginalShape> */
    use SdkModel;

    #[Optional]
    public ?string $height;

    #[Optional]
    public ?string $mp4;

    #[Optional]
    public ?string $url;

    #[Optional]
    public ?string $webp;

    #[Optional]
    public ?string $width;

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
        ?string $height = null,
        ?string $mp4 = null,
        ?string $url = null,
        ?string $webp = null,
        ?string $width = null,
    ): self {
        $self = new self;

        null !== $height && $self['height'] = $height;
        null !== $mp4 && $self['mp4'] = $mp4;
        null !== $url && $self['url'] = $url;
        null !== $webp && $self['webp'] = $webp;
        null !== $width && $self['width'] = $width;

        return $self;
    }

    public function withHeight(string $height): self
    {
        $self = clone $this;
        $self['height'] = $height;

        return $self;
    }

    public function withMP4(string $mp4): self
    {
        $self = clone $this;
        $self['mp4'] = $mp4;

        return $self;
    }

    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }

    public function withWebp(string $webp): self
    {
        $self = clone $this;
        $self['webp'] = $webp;

        return $self;
    }

    public function withWidth(string $width): self
    {
        $self = clone $this;
        $self['width'] = $width;

        return $self;
    }
}
