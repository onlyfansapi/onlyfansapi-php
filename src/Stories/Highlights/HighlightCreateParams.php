<?php

declare(strict_types=1);

namespace Onlyfansapi\Stories\Highlights;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Create a new story highlight.
 *
 * @see Onlyfansapi\Services\Stories\HighlightsService::create()
 *
 * @phpstan-type HighlightCreateParamsShape = array{
 *   coverStoryID: int, storyIDs: list<string>, title: string
 * }
 */
final class HighlightCreateParams implements BaseModel
{
    /** @use SdkModel<HighlightCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The ID of the story to use as the cover for the highlight.
     */
    #[Required('coverStoryId')]
    public int $coverStoryID;

    /**
     * An array of story IDs to include in the highlight.
     *
     * @var list<string> $storyIDs
     */
    #[Required('storyIds', list: 'string')]
    public array $storyIDs;

    /**
     * The title of the story highlight.
     */
    #[Required]
    public string $title;

    /**
     * `new HighlightCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * HighlightCreateParams::with(coverStoryID: ..., storyIDs: ..., title: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new HighlightCreateParams)
     *   ->withCoverStoryID(...)
     *   ->withStoryIDs(...)
     *   ->withTitle(...)
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
     * @param list<string> $storyIDs
     */
    public static function with(
        int $coverStoryID,
        array $storyIDs,
        string $title
    ): self {
        $self = new self;

        $self['coverStoryID'] = $coverStoryID;
        $self['storyIDs'] = $storyIDs;
        $self['title'] = $title;

        return $self;
    }

    /**
     * The ID of the story to use as the cover for the highlight.
     */
    public function withCoverStoryID(int $coverStoryID): self
    {
        $self = clone $this;
        $self['coverStoryID'] = $coverStoryID;

        return $self;
    }

    /**
     * An array of story IDs to include in the highlight.
     *
     * @param list<string> $storyIDs
     */
    public function withStoryIDs(array $storyIDs): self
    {
        $self = clone $this;
        $self['storyIDs'] = $storyIDs;

        return $self;
    }

    /**
     * The title of the story highlight.
     */
    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }
}
