<?php

declare(strict_types=1);

namespace Onlyfansapi\Stories\Highlights;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Add a specific story to a story highlight.
 *
 * @see Onlyfansapi\Services\Stories\HighlightsService::addStory()
 *
 * @phpstan-type HighlightAddStoryParamsShape = array{
 *   account: string, highlightID: int, storyID: int
 * }
 */
final class HighlightAddStoryParams implements BaseModel
{
    /** @use SdkModel<HighlightAddStoryParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    #[Required]
    public int $highlightID;

    /**
     * The ID of the story to add to the highlight.
     */
    #[Required('story_id')]
    public int $storyID;

    /**
     * `new HighlightAddStoryParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * HighlightAddStoryParams::with(account: ..., highlightID: ..., storyID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new HighlightAddStoryParams)
     *   ->withAccount(...)
     *   ->withHighlightID(...)
     *   ->withStoryID(...)
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
     */
    public static function with(
        string $account,
        int $highlightID,
        int $storyID
    ): self {
        $self = new self;

        $self['account'] = $account;
        $self['highlightID'] = $highlightID;
        $self['storyID'] = $storyID;

        return $self;
    }

    public function withAccount(string $account): self
    {
        $self = clone $this;
        $self['account'] = $account;

        return $self;
    }

    public function withHighlightID(int $highlightID): self
    {
        $self = clone $this;
        $self['highlightID'] = $highlightID;

        return $self;
    }

    /**
     * The ID of the story to add to the highlight.
     */
    public function withStoryID(int $storyID): self
    {
        $self = clone $this;
        $self['storyID'] = $storyID;

        return $self;
    }
}
