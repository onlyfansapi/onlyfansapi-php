<?php

declare(strict_types=1);

namespace OnlyFansAPI\Stories\StoryNewResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Stories\StoryNewResponse\Data\Media;
use OnlyFansAPI\Stories\StoryNewResponse\Data\Question;
use OnlyFansAPI\Stories\StoryNewResponse\Data\ReleaseForm;
use OnlyFansAPI\Stories\StoryNewResponse\Data\Text;

/**
 * @phpstan-import-type MediaShape from \OnlyFansAPI\Stories\StoryNewResponse\Data\Media
 * @phpstan-import-type QuestionShape from \OnlyFansAPI\Stories\StoryNewResponse\Data\Question
 * @phpstan-import-type ReleaseFormShape from \OnlyFansAPI\Stories\StoryNewResponse\Data\ReleaseForm
 * @phpstan-import-type TextShape from \OnlyFansAPI\Stories\StoryNewResponse\Data\Text
 *
 * @phpstan-type DataShape = array{
 *   id?: int|null,
 *   canDelete?: bool|null,
 *   canvasHeight?: int|null,
 *   canvasWidth?: int|null,
 *   commentsCount?: int|null,
 *   createdAt?: string|null,
 *   hasPost?: bool|null,
 *   isHighlightCover?: bool|null,
 *   isLastInHighlight?: bool|null,
 *   isReady?: bool|null,
 *   isWatched?: bool|null,
 *   likesCount?: int|null,
 *   media?: list<Media|MediaShape>|null,
 *   question?: null|Question|QuestionShape,
 *   releaseForms?: list<ReleaseForm|ReleaseFormShape>|null,
 *   texts?: list<Text|TextShape>|null,
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
    public ?int $canvasHeight;

    #[Optional]
    public ?int $canvasWidth;

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

    #[Optional]
    public ?Question $question;

    /** @var list<ReleaseForm>|null $releaseForms */
    #[Optional(list: ReleaseForm::class)]
    public ?array $releaseForms;

    /** @var list<Text>|null $texts */
    #[Optional(list: Text::class)]
    public ?array $texts;

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
     * @param Question|QuestionShape|null $question
     * @param list<ReleaseForm|ReleaseFormShape>|null $releaseForms
     * @param list<Text|TextShape>|null $texts
     * @param list<mixed>|null $viewers
     */
    public static function with(
        ?int $id = null,
        ?bool $canDelete = null,
        ?int $canvasHeight = null,
        ?int $canvasWidth = null,
        ?int $commentsCount = null,
        ?string $createdAt = null,
        ?bool $hasPost = null,
        ?bool $isHighlightCover = null,
        ?bool $isLastInHighlight = null,
        ?bool $isReady = null,
        ?bool $isWatched = null,
        ?int $likesCount = null,
        ?array $media = null,
        Question|array|null $question = null,
        ?array $releaseForms = null,
        ?array $texts = null,
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
        null !== $canvasHeight && $self['canvasHeight'] = $canvasHeight;
        null !== $canvasWidth && $self['canvasWidth'] = $canvasWidth;
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
        null !== $texts && $self['texts'] = $texts;
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

    public function withCanvasHeight(int $canvasHeight): self
    {
        $self = clone $this;
        $self['canvasHeight'] = $canvasHeight;

        return $self;
    }

    public function withCanvasWidth(int $canvasWidth): self
    {
        $self = clone $this;
        $self['canvasWidth'] = $canvasWidth;

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

    /**
     * @param Question|QuestionShape $question
     */
    public function withQuestion(Question|array $question): self
    {
        $self = clone $this;
        $self['question'] = $question;

        return $self;
    }

    /**
     * @param list<ReleaseForm|ReleaseFormShape> $releaseForms
     */
    public function withReleaseForms(array $releaseForms): self
    {
        $self = clone $this;
        $self['releaseForms'] = $releaseForms;

        return $self;
    }

    /**
     * @param list<Text|TextShape> $texts
     */
    public function withTexts(array $texts): self
    {
        $self = clone $this;
        $self['texts'] = $texts;

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
