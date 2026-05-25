<?php

declare(strict_types=1);

namespace OnlyFansAPI\Stories;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Post a new media or vault file to your story.
 *
 * @see OnlyFansAPI\Services\StoriesService::create()
 *
 * @phpstan-type StoryCreateParamsShape = array{mediaFiles: list<string>}
 */
final class StoryCreateParams implements BaseModel
{
    /** @use SdkModel<StoryCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Array of media file upload prefixed_ids, or OF media IDs (required if price is not 0).
     *
     * @var list<string> $mediaFiles
     */
    #[Required(list: 'string')]
    public array $mediaFiles;

    /**
     * `new StoryCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * StoryCreateParams::with(mediaFiles: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new StoryCreateParams)->withMediaFiles(...)
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
     * @param list<string> $mediaFiles
     */
    public static function with(array $mediaFiles): self
    {
        $self = new self;

        $self['mediaFiles'] = $mediaFiles;

        return $self;
    }

    /**
     * Array of media file upload prefixed_ids, or OF media IDs (required if price is not 0).
     *
     * @param list<string> $mediaFiles
     */
    public function withMediaFiles(array $mediaFiles): self
    {
        $self = clone $this;
        $self['mediaFiles'] = $mediaFiles;

        return $self;
    }
}
