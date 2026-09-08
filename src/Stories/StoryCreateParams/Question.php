<?php

declare(strict_types=1);

namespace OnlyFansAPI\Stories\StoryCreateParams;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Interactive question sticker viewers can answer.
 *
 * @phpstan-type QuestionShape = array{
 *   color?: string|null,
 *   height?: float|null,
 *   left?: float|null,
 *   text?: string|null,
 *   top?: float|null,
 *   width?: float|null,
 * }
 */
final class Question implements BaseModel
{
    /** @use SdkModel<QuestionShape> */
    use SdkModel;

    /**
     * Sticker accent color (hex). Default `#FF51DC`.
     */
    #[Optional]
    public ?string $color;

    /**
     * Sticker height in canvas px. Default `160`.
     */
    #[Optional]
    public ?float $height;

    /**
     * Horizontal position as a percentage of the canvas width (0-100). Default `25`.
     */
    #[Optional]
    public ?float $left;

    /**
     * The question to ask.
     */
    #[Optional]
    public ?string $text;

    /**
     * Vertical position as a percentage of the canvas height (0-100). Default `30`.
     */
    #[Optional]
    public ?float $top;

    /**
     * Sticker width in canvas px. Default `257`.
     */
    #[Optional]
    public ?float $width;

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
        ?string $color = null,
        ?float $height = null,
        ?float $left = null,
        ?string $text = null,
        ?float $top = null,
        ?float $width = null,
    ): self {
        $self = new self;

        null !== $color && $self['color'] = $color;
        null !== $height && $self['height'] = $height;
        null !== $left && $self['left'] = $left;
        null !== $text && $self['text'] = $text;
        null !== $top && $self['top'] = $top;
        null !== $width && $self['width'] = $width;

        return $self;
    }

    /**
     * Sticker accent color (hex). Default `#FF51DC`.
     */
    public function withColor(string $color): self
    {
        $self = clone $this;
        $self['color'] = $color;

        return $self;
    }

    /**
     * Sticker height in canvas px. Default `160`.
     */
    public function withHeight(float $height): self
    {
        $self = clone $this;
        $self['height'] = $height;

        return $self;
    }

    /**
     * Horizontal position as a percentage of the canvas width (0-100). Default `25`.
     */
    public function withLeft(float $left): self
    {
        $self = clone $this;
        $self['left'] = $left;

        return $self;
    }

    /**
     * The question to ask.
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }

    /**
     * Vertical position as a percentage of the canvas height (0-100). Default `30`.
     */
    public function withTop(float $top): self
    {
        $self = clone $this;
        $self['top'] = $top;

        return $self;
    }

    /**
     * Sticker width in canvas px. Default `257`.
     */
    public function withWidth(float $width): self
    {
        $self = clone $this;
        $self['width'] = $width;

        return $self;
    }
}
