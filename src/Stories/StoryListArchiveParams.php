<?php

declare(strict_types=1);

namespace Onlyfansapi\Stories;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Retrieve a list of your archived stories.
 *
 * @see Onlyfansapi\Services\StoriesService::listArchive()
 *
 * @phpstan-type StoryListArchiveParamsShape = array{
 *   limit?: int|null, marker?: string|null
 * }
 */
final class StoryListArchiveParams implements BaseModel
{
    /** @use SdkModel<StoryListArchiveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Number of stories to return (default = 18).
     */
    #[Optional]
    public ?int $limit;

    /**
     * The marker used for pagination. Default: `null`.
     */
    #[Optional]
    public ?string $marker;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $limit = null, ?string $marker = null): self
    {
        $self = new self;

        null !== $limit && $self['limit'] = $limit;
        null !== $marker && $self['marker'] = $marker;

        return $self;
    }

    /**
     * Number of stories to return (default = 18).
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * The marker used for pagination. Default: `null`.
     */
    public function withMarker(string $marker): self
    {
        $self = clone $this;
        $self['marker'] = $marker;

        return $self;
    }
}
