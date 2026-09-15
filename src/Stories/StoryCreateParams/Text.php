<?php

declare(strict_types=1);

namespace OnlyFansAPI\Stories\StoryCreateParams;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Stories\StoryCreateParams\Text\FontFamily;
use OnlyFansAPI\Stories\StoryCreateParams\Text\FontWeight;
use OnlyFansAPI\Stories\StoryCreateParams\Text\TextAlign;
use OnlyFansAPI\Stories\StoryCreateParams\Text\Type;

/**
 * @phpstan-type TextShape = array{
 *   text: string,
 *   angle?: float|null,
 *   bgColor?: string|null,
 *   color?: string|null,
 *   fontFamily?: null|FontFamily|value-of<FontFamily>,
 *   fontSize?: float|null,
 *   fontWeight?: null|FontWeight|value-of<FontWeight>,
 *   left?: float|null,
 *   scale?: float|null,
 *   textAlign?: null|TextAlign|value-of<TextAlign>,
 *   textHeight?: float|null,
 *   textWidth?: float|null,
 *   top?: float|null,
 *   type?: null|Type|value-of<Type>,
 *   zIndex?: int|null,
 * }
 */
final class Text implements BaseModel
{
    /** @use SdkModel<TextShape> */
    use SdkModel;

    /**
     * The overlay text. For mentions this must be the `@username` to mention (OnlyFans resolves the user and adds them to the story's release forms).
     */
    #[Required]
    public string $text;

    /**
     * Rotation in degrees. Default `0`.
     */
    #[Optional]
    public ?float $angle;

    /**
     * Background color (hex, `#00000000` = transparent). Native editor palette: #FFFFFF #000000 #69818C #FF51DC #FF4081 #FA3240 #FF8040 #FCA800 #70CF27 #00C864 #00B1CC #2196F3 #7953F5 #A832BF. Default: transparent for texts, white for mentions.
     */
    #[Optional]
    public ?string $bgColor;

    /**
     * Text color (hex). Defaults to the native editor behavior: white on a colored background, black on a white background (mentions: OnlyFans blue `#0091EA` on white).
     */
    #[Optional]
    public ?string $color;

    /**
     * Font family. Families support specific weights only: Roboto (400/500/700), PTMono (400), ShantellSans (400), SofiaSans (400, renders uppercase), YanoneKaffeesatz (700), RubikMedium (500), RubikBlack (700). Default `Roboto`. Ignored for mentions (always Roboto 500).
     *
     * @var value-of<FontFamily>|null $fontFamily
     */
    #[Optional(enum: FontFamily::class)]
    public ?string $fontFamily;

    /**
     * Font size in canvas px (8-100). The native editor uses 9-36. Default `20`.
     */
    #[Optional]
    public ?float $fontSize;

    /**
     * Font weight; must match the chosen family (see `fontFamily`).
     *
     * @var value-of<FontWeight>|null $fontWeight
     */
    #[Optional(enum: FontWeight::class)]
    public ?int $fontWeight;

    /**
     * Horizontal position as a percentage of the canvas width (0-100). Default `25`.
     */
    #[Optional]
    public ?float $left;

    /**
     * Scale factor. Default `1`.
     */
    #[Optional]
    public ?float $scale;

    /**
     * Text alignment. Default `left`.
     *
     * @var value-of<TextAlign>|null $textAlign
     */
    #[Optional(enum: TextAlign::class)]
    public ?string $textAlign;

    /**
     * Rendered text box height in canvas px. Estimated automatically when omitted.
     */
    #[Optional]
    public ?float $textHeight;

    /**
     * Rendered text box width in canvas px. Estimated automatically when omitted.
     */
    #[Optional]
    public ?float $textWidth;

    /**
     * Vertical position as a percentage of the canvas height (0-100). Defaults stagger each overlay below the previous one.
     */
    #[Optional]
    public ?float $top;

    /**
     * Overlay type. Default `text`.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
    public ?string $type;

    /**
     * Stacking order. Defaults to placement order.
     */
    #[Optional]
    public ?int $zIndex;

    /**
     * `new Text()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Text::with(text: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Text)->withText(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param FontFamily|value-of<FontFamily>|null $fontFamily
     * @param FontWeight|value-of<FontWeight>|null $fontWeight
     * @param TextAlign|value-of<TextAlign>|null $textAlign
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        string $text,
        ?float $angle = null,
        ?string $bgColor = null,
        ?string $color = null,
        FontFamily|string|null $fontFamily = null,
        ?float $fontSize = null,
        FontWeight|int|null $fontWeight = null,
        ?float $left = null,
        ?float $scale = null,
        TextAlign|string|null $textAlign = null,
        ?float $textHeight = null,
        ?float $textWidth = null,
        ?float $top = null,
        Type|string|null $type = null,
        ?int $zIndex = null,
    ): self {
        $self = new self;

        $self['text'] = $text;

        null !== $angle && $self['angle'] = $angle;
        null !== $bgColor && $self['bgColor'] = $bgColor;
        null !== $color && $self['color'] = $color;
        null !== $fontFamily && $self['fontFamily'] = $fontFamily;
        null !== $fontSize && $self['fontSize'] = $fontSize;
        null !== $fontWeight && $self['fontWeight'] = $fontWeight;
        null !== $left && $self['left'] = $left;
        null !== $scale && $self['scale'] = $scale;
        null !== $textAlign && $self['textAlign'] = $textAlign;
        null !== $textHeight && $self['textHeight'] = $textHeight;
        null !== $textWidth && $self['textWidth'] = $textWidth;
        null !== $top && $self['top'] = $top;
        null !== $type && $self['type'] = $type;
        null !== $zIndex && $self['zIndex'] = $zIndex;

        return $self;
    }

    /**
     * The overlay text. For mentions this must be the `@username` to mention (OnlyFans resolves the user and adds them to the story's release forms).
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }

    /**
     * Rotation in degrees. Default `0`.
     */
    public function withAngle(float $angle): self
    {
        $self = clone $this;
        $self['angle'] = $angle;

        return $self;
    }

    /**
     * Background color (hex, `#00000000` = transparent). Native editor palette: #FFFFFF #000000 #69818C #FF51DC #FF4081 #FA3240 #FF8040 #FCA800 #70CF27 #00C864 #00B1CC #2196F3 #7953F5 #A832BF. Default: transparent for texts, white for mentions.
     */
    public function withBgColor(string $bgColor): self
    {
        $self = clone $this;
        $self['bgColor'] = $bgColor;

        return $self;
    }

    /**
     * Text color (hex). Defaults to the native editor behavior: white on a colored background, black on a white background (mentions: OnlyFans blue `#0091EA` on white).
     */
    public function withColor(string $color): self
    {
        $self = clone $this;
        $self['color'] = $color;

        return $self;
    }

    /**
     * Font family. Families support specific weights only: Roboto (400/500/700), PTMono (400), ShantellSans (400), SofiaSans (400, renders uppercase), YanoneKaffeesatz (700), RubikMedium (500), RubikBlack (700). Default `Roboto`. Ignored for mentions (always Roboto 500).
     *
     * @param FontFamily|value-of<FontFamily> $fontFamily
     */
    public function withFontFamily(FontFamily|string $fontFamily): self
    {
        $self = clone $this;
        $self['fontFamily'] = $fontFamily;

        return $self;
    }

    /**
     * Font size in canvas px (8-100). The native editor uses 9-36. Default `20`.
     */
    public function withFontSize(float $fontSize): self
    {
        $self = clone $this;
        $self['fontSize'] = $fontSize;

        return $self;
    }

    /**
     * Font weight; must match the chosen family (see `fontFamily`).
     *
     * @param FontWeight|value-of<FontWeight> $fontWeight
     */
    public function withFontWeight(FontWeight|int $fontWeight): self
    {
        $self = clone $this;
        $self['fontWeight'] = $fontWeight;

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
     * Scale factor. Default `1`.
     */
    public function withScale(float $scale): self
    {
        $self = clone $this;
        $self['scale'] = $scale;

        return $self;
    }

    /**
     * Text alignment. Default `left`.
     *
     * @param TextAlign|value-of<TextAlign> $textAlign
     */
    public function withTextAlign(TextAlign|string $textAlign): self
    {
        $self = clone $this;
        $self['textAlign'] = $textAlign;

        return $self;
    }

    /**
     * Rendered text box height in canvas px. Estimated automatically when omitted.
     */
    public function withTextHeight(float $textHeight): self
    {
        $self = clone $this;
        $self['textHeight'] = $textHeight;

        return $self;
    }

    /**
     * Rendered text box width in canvas px. Estimated automatically when omitted.
     */
    public function withTextWidth(float $textWidth): self
    {
        $self = clone $this;
        $self['textWidth'] = $textWidth;

        return $self;
    }

    /**
     * Vertical position as a percentage of the canvas height (0-100). Defaults stagger each overlay below the previous one.
     */
    public function withTop(float $top): self
    {
        $self = clone $this;
        $self['top'] = $top;

        return $self;
    }

    /**
     * Overlay type. Default `text`.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Stacking order. Defaults to placement order.
     */
    public function withZIndex(int $zIndex): self
    {
        $self = clone $this;
        $self['zIndex'] = $zIndex;

        return $self;
    }
}
