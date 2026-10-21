<?php

declare(strict_types=1);

namespace OnlyFansAPI\Stories\Highlights;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Retrieve a list of your story highlights.
 *
 * @see OnlyFansAPI\Services\Stories\HighlightsService::list()
 *
 * @phpstan-type HighlightListParamsShape = array{
 *   limit?: int|null, offset?: int|null
 * }
 */
final class HighlightListParams implements BaseModel
{
    /** @use SdkModel<HighlightListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Number of highlights to return (default = 5).
     */
    #[Optional]
    public ?int $limit;

    /**
     * Number of highlights to skip for pagination.
     */
    #[Optional]
    public ?int $offset;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $limit = null, ?int $offset = null): self
    {
        $self = new self;

        null !== $limit && $self['limit'] = $limit;
        null !== $offset && $self['offset'] = $offset;

        return $self;
    }

    /**
     * Number of highlights to return (default = 5).
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Number of highlights to skip for pagination.
     */
    public function withOffset(int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }
}
