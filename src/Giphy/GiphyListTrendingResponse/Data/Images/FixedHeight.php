<?php

declare(strict_types=1);

namespace OnlyFansAPI\Giphy\GiphyListTrendingResponse\Data\Images;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type FixedHeightShape = array{
 *   height?: string|null, url?: string|null, width?: string|null
 * }
 */
final class FixedHeight implements BaseModel
{
    /** @use SdkModel<FixedHeightShape> */
    use SdkModel;

    #[Optional]
    public ?string $height;

    #[Optional]
    public ?string $url;

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
        ?string $url = null,
        ?string $width = null
    ): self {
        $self = new self;

        null !== $height && $self['height'] = $height;
        null !== $url && $self['url'] = $url;
        null !== $width && $self['width'] = $width;

        return $self;
    }

    public function withHeight(string $height): self
    {
        $self = clone $this;
        $self['height'] = $height;

        return $self;
    }

    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }

    public function withWidth(string $width): self
    {
        $self = clone $this;
        $self['width'] = $width;

        return $self;
    }
}
