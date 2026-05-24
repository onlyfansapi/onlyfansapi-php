<?php

declare(strict_types=1);

namespace Onlyfansapi\ReleaseForms\ReleaseFormNewReleaseFormResponse\Data\User;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type HeaderSizeShape = array{height?: int|null, width?: int|null}
 */
final class HeaderSize implements BaseModel
{
    /** @use SdkModel<HeaderSizeShape> */
    use SdkModel;

    #[Optional]
    public ?int $height;

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
    public static function with(?int $height = null, ?int $width = null): self
    {
        $self = new self;

        null !== $height && $self['height'] = $height;
        null !== $width && $self['width'] = $width;

        return $self;
    }

    public function withHeight(int $height): self
    {
        $self = clone $this;
        $self['height'] = $height;

        return $self;
    }

    public function withWidth(int $width): self
    {
        $self = clone $this;
        $self['width'] = $width;

        return $self;
    }
}
