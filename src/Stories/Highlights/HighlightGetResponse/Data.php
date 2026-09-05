<?php

declare(strict_types=1);

namespace OnlyFansAPI\Stories\Highlights\HighlightGetResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Stories\Highlights\HighlightGetResponse\Data\Story;

/**
 * @phpstan-import-type StoryShape from \OnlyFansAPI\Stories\Highlights\HighlightGetResponse\Data\Story
 *
 * @phpstan-type DataShape = array{
 *   id?: int|null,
 *   cover?: string|null,
 *   coverStoryID?: int|null,
 *   createdAt?: string|null,
 *   stories?: list<Story|StoryShape>|null,
 *   storiesCount?: int|null,
 *   title?: string|null,
 *   userID?: int|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional]
    public ?string $cover;

    #[Optional('coverStoryId')]
    public ?int $coverStoryID;

    #[Optional]
    public ?string $createdAt;

    /** @var list<Story>|null $stories */
    #[Optional(list: Story::class)]
    public ?array $stories;

    #[Optional]
    public ?int $storiesCount;

    #[Optional]
    public ?string $title;

    #[Optional('userId')]
    public ?int $userID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Story|StoryShape>|null $stories
     */
    public static function with(
        ?int $id = null,
        ?string $cover = null,
        ?int $coverStoryID = null,
        ?string $createdAt = null,
        ?array $stories = null,
        ?int $storiesCount = null,
        ?string $title = null,
        ?int $userID = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $cover && $self['cover'] = $cover;
        null !== $coverStoryID && $self['coverStoryID'] = $coverStoryID;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $stories && $self['stories'] = $stories;
        null !== $storiesCount && $self['storiesCount'] = $storiesCount;
        null !== $title && $self['title'] = $title;
        null !== $userID && $self['userID'] = $userID;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCover(string $cover): self
    {
        $self = clone $this;
        $self['cover'] = $cover;

        return $self;
    }

    public function withCoverStoryID(int $coverStoryID): self
    {
        $self = clone $this;
        $self['coverStoryID'] = $coverStoryID;

        return $self;
    }

    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * @param list<Story|StoryShape> $stories
     */
    public function withStories(array $stories): self
    {
        $self = clone $this;
        $self['stories'] = $stories;

        return $self;
    }

    public function withStoriesCount(int $storiesCount): self
    {
        $self = clone $this;
        $self['storiesCount'] = $storiesCount;

        return $self;
    }

    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }

    public function withUserID(int $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }
}
