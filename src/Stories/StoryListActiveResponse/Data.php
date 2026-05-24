<?php

declare(strict_types=1);

namespace Onlyfansapi\Stories\StoryListActiveResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Stories\StoryListActiveResponse\Data\Media;

/**
 * @phpstan-import-type MediaShape from \Onlyfansapi\Stories\StoryListActiveResponse\Data\Media
 *
 * @phpstan-type DataShape = array{
 *   id?: int|null,
 *   canDelete?: bool|null,
 *   commentsCount?: int|null,
 *   createdAt?: string|null,
 *   hasPost?: bool|null,
 *   isHighlightCover?: bool|null,
 *   isLastInHighlight?: bool|null,
 *   isReady?: bool|null,
 *   isWatched?: bool|null,
 *   likesCount?: int|null,
 *   media?: list<Media|MediaShape>|null,
 *   question?: string|null,
 *   releaseForms?: list<mixed>|null,
 *   tipsAmount?: string|null,
 *   tipsAmountRaw?: int|null,
 *   tipsCount?: int|null,
 *   userID?: int|null,
 *   viewers?: list<mixed>|null,
 *   viewersCount?: int|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional]
    public ?bool $canDelete;

    #[Optional]
    public ?int $commentsCount;

    #[Optional]
    public ?string $createdAt;

    #[Optional]
    public ?bool $hasPost;

    #[Optional]
    public ?bool $isHighlightCover;

    #[Optional]
    public ?bool $isLastInHighlight;

    #[Optional]
    public ?bool $isReady;

    #[Optional]
    public ?bool $isWatched;

    #[Optional]
    public ?int $likesCount;

    /** @var list<Media>|null $media */
    #[Optional(list: Media::class)]
    public ?array $media;

    #[Optional(nullable: true)]
    public ?string $question;

    /** @var list<mixed>|null $releaseForms */
    #[Optional(list: 'mixed')]
    public ?array $releaseForms;

    #[Optional]
    public ?string $tipsAmount;

    #[Optional]
    public ?int $tipsAmountRaw;

    #[Optional]
    public ?int $tipsCount;

    #[Optional('userId')]
    public ?int $userID;

    /** @var list<mixed>|null $viewers */
    #[Optional(list: 'mixed')]
    public ?array $viewers;

    #[Optional]
    public ?int $viewersCount;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Media|MediaShape>|null $media
     * @param list<mixed>|null $releaseForms
     * @param list<mixed>|null $viewers
     */
    public static function with(
        ?int $id = null,
        ?bool $canDelete = null,
        ?int $commentsCount = null,
        ?string $createdAt = null,
        ?bool $hasPost = null,
        ?bool $isHighlightCover = null,
        ?bool $isLastInHighlight = null,
        ?bool $isReady = null,
        ?bool $isWatched = null,
        ?int $likesCount = null,
        ?array $media = null,
        ?string $question = null,
        ?array $releaseForms = null,
        ?string $tipsAmount = null,
        ?int $tipsAmountRaw = null,
        ?int $tipsCount = null,
        ?int $userID = null,
        ?array $viewers = null,
        ?int $viewersCount = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $canDelete && $self['canDelete'] = $canDelete;
        null !== $commentsCount && $self['commentsCount'] = $commentsCount;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $hasPost && $self['hasPost'] = $hasPost;
        null !== $isHighlightCover && $self['isHighlightCover'] = $isHighlightCover;
        null !== $isLastInHighlight && $self['isLastInHighlight'] = $isLastInHighlight;
        null !== $isReady && $self['isReady'] = $isReady;
        null !== $isWatched && $self['isWatched'] = $isWatched;
        null !== $likesCount && $self['likesCount'] = $likesCount;
        null !== $media && $self['media'] = $media;
        null !== $question && $self['question'] = $question;
        null !== $releaseForms && $self['releaseForms'] = $releaseForms;
        null !== $tipsAmount && $self['tipsAmount'] = $tipsAmount;
        null !== $tipsAmountRaw && $self['tipsAmountRaw'] = $tipsAmountRaw;
        null !== $tipsCount && $self['tipsCount'] = $tipsCount;
        null !== $userID && $self['userID'] = $userID;
        null !== $viewers && $self['viewers'] = $viewers;
        null !== $viewersCount && $self['viewersCount'] = $viewersCount;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCanDelete(bool $canDelete): self
    {
        $self = clone $this;
        $self['canDelete'] = $canDelete;

        return $self;
    }

    public function withCommentsCount(int $commentsCount): self
    {
        $self = clone $this;
        $self['commentsCount'] = $commentsCount;

        return $self;
    }

    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withHasPost(bool $hasPost): self
    {
        $self = clone $this;
        $self['hasPost'] = $hasPost;

        return $self;
    }

    public function withIsHighlightCover(bool $isHighlightCover): self
    {
        $self = clone $this;
        $self['isHighlightCover'] = $isHighlightCover;

        return $self;
    }

    public function withIsLastInHighlight(bool $isLastInHighlight): self
    {
        $self = clone $this;
        $self['isLastInHighlight'] = $isLastInHighlight;

        return $self;
    }

    public function withIsReady(bool $isReady): self
    {
        $self = clone $this;
        $self['isReady'] = $isReady;

        return $self;
    }

    public function withIsWatched(bool $isWatched): self
    {
        $self = clone $this;
        $self['isWatched'] = $isWatched;

        return $self;
    }

    public function withLikesCount(int $likesCount): self
    {
        $self = clone $this;
        $self['likesCount'] = $likesCount;

        return $self;
    }

    /**
     * @param list<Media|MediaShape> $media
     */
    public function withMedia(array $media): self
    {
        $self = clone $this;
        $self['media'] = $media;

        return $self;
    }

    public function withQuestion(?string $question): self
    {
        $self = clone $this;
        $self['question'] = $question;

        return $self;
    }

    /**
     * @param list<mixed> $releaseForms
     */
    public function withReleaseForms(array $releaseForms): self
    {
        $self = clone $this;
        $self['releaseForms'] = $releaseForms;

        return $self;
    }

    public function withTipsAmount(string $tipsAmount): self
    {
        $self = clone $this;
        $self['tipsAmount'] = $tipsAmount;

        return $self;
    }

    public function withTipsAmountRaw(int $tipsAmountRaw): self
    {
        $self = clone $this;
        $self['tipsAmountRaw'] = $tipsAmountRaw;

        return $self;
    }

    public function withTipsCount(int $tipsCount): self
    {
        $self = clone $this;
        $self['tipsCount'] = $tipsCount;

        return $self;
    }

    public function withUserID(int $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }

    /**
     * @param list<mixed> $viewers
     */
    public function withViewers(array $viewers): self
    {
        $self = clone $this;
        $self['viewers'] = $viewers;

        return $self;
    }

    public function withViewersCount(int $viewersCount): self
    {
        $self = clone $this;
        $self['viewersCount'] = $viewersCount;

        return $self;
    }
}
