<?php

declare(strict_types=1);

namespace OnlyFansAPI\Stories\Highlights;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Update the details of a specific story highlight by its ID.
 *
 * @see OnlyFansAPI\Services\Stories\HighlightsService::update()
 *
 * @phpstan-type HighlightUpdateParamsShape = array{
 *   account: string, coverStoryID: int, storyIDs: list<string>, title: string
 * }
 */
final class HighlightUpdateParams implements BaseModel
{
    /** @use SdkModel<HighlightUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * The ID of the story to use as the cover for the highlight. Provide the old value if you don't want to change it.
     */
    #[Required('coverStoryId')]
    public int $coverStoryID;

    /**
     * An array of story IDs to include in the highlight. Provide the old value if you don't want to change it.
     *
     * @var list<string> $storyIDs
     */
    #[Required('storyIds', list: 'string')]
    public array $storyIDs;

    /**
     * The new title for the story highlight. Provide the old value if you don't want to change it.
     */
    #[Required]
    public string $title;

    /**
     * `new HighlightUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * HighlightUpdateParams::with(
     *   account: ..., coverStoryID: ..., storyIDs: ..., title: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new HighlightUpdateParams)
     *   ->withAccount(...)
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
        string $account,
        int $coverStoryID,
        array $storyIDs,
        string $title
    ): self {
        $self = new self;

        $self['account'] = $account;
        $self['coverStoryID'] = $coverStoryID;
        $self['storyIDs'] = $storyIDs;
        $self['title'] = $title;

        return $self;
    }

    public function withAccount(string $account): self
    {
        $self = clone $this;
        $self['account'] = $account;

        return $self;
    }

    /**
     * The ID of the story to use as the cover for the highlight. Provide the old value if you don't want to change it.
     */
    public function withCoverStoryID(int $coverStoryID): self
    {
        $self = clone $this;
        $self['coverStoryID'] = $coverStoryID;

        return $self;
    }

    /**
     * An array of story IDs to include in the highlight. Provide the old value if you don't want to change it.
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
     * The new title for the story highlight. Provide the old value if you don't want to change it.
     */
    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }
}
