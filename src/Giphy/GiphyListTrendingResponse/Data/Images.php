<?php

declare(strict_types=1);

namespace Onlyfansapi\Giphy\GiphyListTrendingResponse\Data;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Giphy\GiphyListTrendingResponse\Data\Images\FixedHeight;
use Onlyfansapi\Giphy\GiphyListTrendingResponse\Data\Images\Original;

/**
 * @phpstan-import-type FixedHeightShape from \Onlyfansapi\Giphy\GiphyListTrendingResponse\Data\Images\FixedHeight
 * @phpstan-import-type OriginalShape from \Onlyfansapi\Giphy\GiphyListTrendingResponse\Data\Images\Original
 *
 * @phpstan-type ImagesShape = array{
 *   fixedHeight?: null|FixedHeight|FixedHeightShape,
 *   original?: null|Original|OriginalShape,
 * }
 */
final class Images implements BaseModel
{
    /** @use SdkModel<ImagesShape> */
    use SdkModel;

    #[Optional('fixed_height')]
    public ?FixedHeight $fixedHeight;

    #[Optional]
    public ?Original $original;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param FixedHeight|FixedHeightShape|null $fixedHeight
     * @param Original|OriginalShape|null $original
     */
    public static function with(
        FixedHeight|array|null $fixedHeight = null,
        Original|array|null $original = null
    ): self {
        $self = new self;

        null !== $fixedHeight && $self['fixedHeight'] = $fixedHeight;
        null !== $original && $self['original'] = $original;

        return $self;
    }

    /**
     * @param FixedHeight|FixedHeightShape $fixedHeight
     */
    public function withFixedHeight(FixedHeight|array $fixedHeight): self
    {
        $self = clone $this;
        $self['fixedHeight'] = $fixedHeight;

        return $self;
    }

    /**
     * @param Original|OriginalShape $original
     */
    public function withOriginal(Original|array $original): self
    {
        $self = clone $this;
        $self['original'] = $original;

        return $self;
    }
}
