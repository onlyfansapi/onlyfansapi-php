<?php

declare(strict_types=1);

namespace OnlyFansAPI\MassMessaging\MassMessagingGetOverviewResponse\Data\Item\Media\Files;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type ThumbShape = array{
 *   height?: int|null, size?: int|null, url?: string|null, width?: int|null
 * }
 */
final class Thumb implements BaseModel
{
    /** @use SdkModel<ThumbShape> */
    use SdkModel;

    #[Optional]
    public ?int $height;

    #[Optional]
    public ?int $size;

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
     */
    public static function with(
        ?int $height = null,
        ?int $size = null,
        ?string $url = null,
        ?int $width = null
    ): self {
        $self = new self;

        null !== $height && $self['height'] = $height;
        null !== $size && $self['size'] = $size;
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
