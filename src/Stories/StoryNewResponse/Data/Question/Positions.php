<?php

declare(strict_types=1);

namespace OnlyFansAPI\Stories\StoryNewResponse\Data\Question;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type PositionsShape = array{
 *   angle?: int|null,
 *   color?: string|null,
 *   height?: int|null,
 *   left?: int|null,
 *   top?: int|null,
 *   width?: int|null,
 *   x?: string|null,
 *   y?: string|null,
 *   zIndex?: int|null,
 * }
 */
final class Positions implements BaseModel
{
    /** @use SdkModel<PositionsShape> */
    use SdkModel;

    #[Optional]
    public ?int $angle;

    #[Optional]
    public ?string $color;

    #[Optional]
    public ?int $height;

    #[Optional]
    public ?int $left;

    #[Optional]
    public ?int $top;

    #[Optional]
    public ?int $width;

    #[Optional(nullable: true)]
    public ?string $x;

    #[Optional(nullable: true)]
    public ?string $y;

    #[Optional]
    public ?int $zIndex;

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
        ?int $angle = null,
        ?string $color = null,
        ?int $height = null,
        ?int $left = null,
        ?int $top = null,
        ?int $width = null,
        ?string $x = null,
        ?string $y = null,
        ?int $zIndex = null,
    ): self {
        $self = new self;

        null !== $angle && $self['angle'] = $angle;
        null !== $color && $self['color'] = $color;
        null !== $height && $self['height'] = $height;
        null !== $left && $self['left'] = $left;
        null !== $top && $self['top'] = $top;
        null !== $width && $self['width'] = $width;
        null !== $x && $self['x'] = $x;
        null !== $y && $self['y'] = $y;
        null !== $zIndex && $self['zIndex'] = $zIndex;

        return $self;
    }

    public function withAngle(int $angle): self
    {
        $self = clone $this;
        $self['angle'] = $angle;

        return $self;
    }

    public function withColor(string $color): self
    {
        $self = clone $this;
        $self['color'] = $color;

        return $self;
    }

    public function withHeight(int $height): self
    {
        $self = clone $this;
        $self['height'] = $height;

        return $self;
    }

    public function withLeft(int $left): self
    {
        $self = clone $this;
        $self['left'] = $left;

        return $self;
    }

    public function withTop(int $top): self
    {
        $self = clone $this;
        $self['top'] = $top;

        return $self;
    }

    public function withWidth(int $width): self
    {
        $self = clone $this;
        $self['width'] = $width;

        return $self;
    }

    public function withX(?string $x): self
    {
        $self = clone $this;
        $self['x'] = $x;

        return $self;
    }

    public function withY(?string $y): self
    {
        $self = clone $this;
        $self['y'] = $y;

        return $self;
    }

    public function withZIndex(int $zIndex): self
    {
        $self = clone $this;
        $self['zIndex'] = $zIndex;

        return $self;
    }
}
