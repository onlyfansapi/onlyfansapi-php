<?php

declare(strict_types=1);

namespace Onlyfansapi\Stories\Highlights\HighlightGetResponse\Data\Story;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type TextShape = array{
 *   angle?: int|null,
 *   bgColor?: string|null,
 *   color?: string|null,
 *   fontFamily?: string|null,
 *   fontSize?: string|null,
 *   fontStyle?: string|null,
 *   fontWeight?: int|null,
 *   left?: float|null,
 *   scale?: float|null,
 *   text?: string|null,
 *   textAlign?: string|null,
 *   textHeight?: float|null,
 *   textWidth?: float|null,
 *   top?: float|null,
 *   type?: string|null,
 *   users?: list<mixed>|null,
 *   zIndex?: int|null,
 * }
 */
final class Text implements BaseModel
{
    /** @use SdkModel<TextShape> */
    use SdkModel;

    #[Optional]
    public ?int $angle;

    #[Optional]
    public ?string $bgColor;

    #[Optional]
    public ?string $color;

    #[Optional]
    public ?string $fontFamily;

    #[Optional]
    public ?string $fontSize;

    #[Optional(nullable: true)]
    public ?string $fontStyle;

    #[Optional]
    public ?int $fontWeight;

    #[Optional]
    public ?float $left;

    #[Optional]
    public ?float $scale;

    #[Optional]
    public ?string $text;

    #[Optional]
    public ?string $textAlign;

    #[Optional]
    public ?float $textHeight;

    #[Optional]
    public ?float $textWidth;

    #[Optional]
    public ?float $top;

    #[Optional]
    public ?string $type;

    /** @var list<mixed>|null $users */
    #[Optional(list: 'mixed')]
    public ?array $users;

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
     *
     * @param list<mixed>|null $users
     */
    public static function with(
        ?int $angle = null,
        ?string $bgColor = null,
        ?string $color = null,
        ?string $fontFamily = null,
        ?string $fontSize = null,
        ?string $fontStyle = null,
        ?int $fontWeight = null,
        ?float $left = null,
        ?float $scale = null,
        ?string $text = null,
        ?string $textAlign = null,
        ?float $textHeight = null,
        ?float $textWidth = null,
        ?float $top = null,
        ?string $type = null,
        ?array $users = null,
        ?int $zIndex = null,
    ): self {
        $self = new self;

        null !== $angle && $self['angle'] = $angle;
        null !== $bgColor && $self['bgColor'] = $bgColor;
        null !== $color && $self['color'] = $color;
        null !== $fontFamily && $self['fontFamily'] = $fontFamily;
        null !== $fontSize && $self['fontSize'] = $fontSize;
        null !== $fontStyle && $self['fontStyle'] = $fontStyle;
        null !== $fontWeight && $self['fontWeight'] = $fontWeight;
        null !== $left && $self['left'] = $left;
        null !== $scale && $self['scale'] = $scale;
        null !== $text && $self['text'] = $text;
        null !== $textAlign && $self['textAlign'] = $textAlign;
        null !== $textHeight && $self['textHeight'] = $textHeight;
        null !== $textWidth && $self['textWidth'] = $textWidth;
        null !== $top && $self['top'] = $top;
        null !== $type && $self['type'] = $type;
        null !== $users && $self['users'] = $users;
        null !== $zIndex && $self['zIndex'] = $zIndex;

        return $self;
    }

    public function withAngle(int $angle): self
    {
        $self = clone $this;
        $self['angle'] = $angle;

        return $self;
    }

    public function withBgColor(string $bgColor): self
    {
        $self = clone $this;
        $self['bgColor'] = $bgColor;

        return $self;
    }

    public function withColor(string $color): self
    {
        $self = clone $this;
        $self['color'] = $color;

        return $self;
    }

    public function withFontFamily(string $fontFamily): self
    {
        $self = clone $this;
        $self['fontFamily'] = $fontFamily;

        return $self;
    }

    public function withFontSize(string $fontSize): self
    {
        $self = clone $this;
        $self['fontSize'] = $fontSize;

        return $self;
    }

    public function withFontStyle(?string $fontStyle): self
    {
        $self = clone $this;
        $self['fontStyle'] = $fontStyle;

        return $self;
    }

    public function withFontWeight(int $fontWeight): self
    {
        $self = clone $this;
        $self['fontWeight'] = $fontWeight;

        return $self;
    }

    public function withLeft(float $left): self
    {
        $self = clone $this;
        $self['left'] = $left;

        return $self;
    }

    public function withScale(float $scale): self
    {
        $self = clone $this;
        $self['scale'] = $scale;

        return $self;
    }

    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }

    public function withTextAlign(string $textAlign): self
    {
        $self = clone $this;
        $self['textAlign'] = $textAlign;

        return $self;
    }

    public function withTextHeight(float $textHeight): self
    {
        $self = clone $this;
        $self['textHeight'] = $textHeight;

        return $self;
    }

    public function withTextWidth(float $textWidth): self
    {
        $self = clone $this;
        $self['textWidth'] = $textWidth;

        return $self;
    }

    public function withTop(float $top): self
    {
        $self = clone $this;
        $self['top'] = $top;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param list<mixed> $users
     */
    public function withUsers(array $users): self
    {
        $self = clone $this;
        $self['users'] = $users;

        return $self;
    }

    public function withZIndex(int $zIndex): self
    {
        $self = clone $this;
        $self['zIndex'] = $zIndex;

        return $self;
    }
}
