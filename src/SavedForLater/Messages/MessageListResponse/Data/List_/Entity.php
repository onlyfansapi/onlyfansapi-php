<?php

declare(strict_types=1);

namespace Onlyfansapi\SavedForLater\Messages\MessageListResponse\Data\List_;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type EntityShape = array{
 *   id?: int|null,
 *   cancelSeconds?: int|null,
 *   canPurchase?: bool|null,
 *   canUnsendQueue?: bool|null,
 *   changedAt?: string|null,
 *   createdAt?: string|null,
 *   giphyID?: string|null,
 *   isFree?: bool|null,
 *   isFromQueue?: bool|null,
 *   isLiked?: bool|null,
 *   isMarkdownDisabled?: bool|null,
 *   isMediaReady?: bool|null,
 *   isNew?: bool|null,
 *   isOpened?: bool|null,
 *   isTip?: bool|null,
 *   lockedText?: bool|null,
 *   media?: list<mixed>|null,
 *   mediaCount?: int|null,
 *   previews?: list<mixed>|null,
 *   price?: int|null,
 *   queueID?: int|null,
 *   rawText?: string|null,
 *   releaseForms?: list<mixed>|null,
 *   responseType?: string|null,
 *   scheduledAt?: string|null,
 *   sentRulesExtra?: string|null,
 *   sentRulesType?: string|null,
 *   text?: string|null,
 *   unsendSecondsQueue?: int|null,
 *   userIDs?: list<string>|null,
 * }
 */
final class Entity implements BaseModel
{
    /** @use SdkModel<EntityShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional]
    public ?int $cancelSeconds;

    #[Optional]
    public ?bool $canPurchase;

    #[Optional]
    public ?bool $canUnsendQueue;

    #[Optional]
    public ?string $changedAt;

    #[Optional]
    public ?string $createdAt;

    #[Optional('giphyId')]
    public ?string $giphyID;

    #[Optional]
    public ?bool $isFree;

    #[Optional]
    public ?bool $isFromQueue;

    #[Optional]
    public ?bool $isLiked;

    #[Optional]
    public ?bool $isMarkdownDisabled;

    #[Optional]
    public ?bool $isMediaReady;

    #[Optional]
    public ?bool $isNew;

    #[Optional]
    public ?bool $isOpened;

    #[Optional]
    public ?bool $isTip;

    #[Optional]
    public ?bool $lockedText;

    /** @var list<mixed>|null $media */
    #[Optional(list: 'mixed')]
    public ?array $media;

    #[Optional]
    public ?int $mediaCount;

    /** @var list<mixed>|null $previews */
    #[Optional(list: 'mixed')]
    public ?array $previews;

    #[Optional]
    public ?int $price;

    #[Optional('queueId')]
    public ?int $queueID;

    #[Optional]
    public ?string $rawText;

    /** @var list<mixed>|null $releaseForms */
    #[Optional(list: 'mixed')]
    public ?array $releaseForms;

    #[Optional]
    public ?string $responseType;

    #[Optional]
    public ?string $scheduledAt;

    #[Optional]
    public ?string $sentRulesExtra;

    #[Optional]
    public ?string $sentRulesType;

    #[Optional]
    public ?string $text;

    #[Optional]
    public ?int $unsendSecondsQueue;

    /** @var list<string>|null $userIDs */
    #[Optional('userIds', list: 'string')]
    public ?array $userIDs;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<mixed>|null $media
     * @param list<mixed>|null $previews
     * @param list<mixed>|null $releaseForms
     * @param list<string>|null $userIDs
     */
    public static function with(
        ?int $id = null,
        ?int $cancelSeconds = null,
        ?bool $canPurchase = null,
        ?bool $canUnsendQueue = null,
        ?string $changedAt = null,
        ?string $createdAt = null,
        ?string $giphyID = null,
        ?bool $isFree = null,
        ?bool $isFromQueue = null,
        ?bool $isLiked = null,
        ?bool $isMarkdownDisabled = null,
        ?bool $isMediaReady = null,
        ?bool $isNew = null,
        ?bool $isOpened = null,
        ?bool $isTip = null,
        ?bool $lockedText = null,
        ?array $media = null,
        ?int $mediaCount = null,
        ?array $previews = null,
        ?int $price = null,
        ?int $queueID = null,
        ?string $rawText = null,
        ?array $releaseForms = null,
        ?string $responseType = null,
        ?string $scheduledAt = null,
        ?string $sentRulesExtra = null,
        ?string $sentRulesType = null,
        ?string $text = null,
        ?int $unsendSecondsQueue = null,
        ?array $userIDs = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $cancelSeconds && $self['cancelSeconds'] = $cancelSeconds;
        null !== $canPurchase && $self['canPurchase'] = $canPurchase;
        null !== $canUnsendQueue && $self['canUnsendQueue'] = $canUnsendQueue;
        null !== $changedAt && $self['changedAt'] = $changedAt;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $giphyID && $self['giphyID'] = $giphyID;
        null !== $isFree && $self['isFree'] = $isFree;
        null !== $isFromQueue && $self['isFromQueue'] = $isFromQueue;
        null !== $isLiked && $self['isLiked'] = $isLiked;
        null !== $isMarkdownDisabled && $self['isMarkdownDisabled'] = $isMarkdownDisabled;
        null !== $isMediaReady && $self['isMediaReady'] = $isMediaReady;
        null !== $isNew && $self['isNew'] = $isNew;
        null !== $isOpened && $self['isOpened'] = $isOpened;
        null !== $isTip && $self['isTip'] = $isTip;
        null !== $lockedText && $self['lockedText'] = $lockedText;
        null !== $media && $self['media'] = $media;
        null !== $mediaCount && $self['mediaCount'] = $mediaCount;
        null !== $previews && $self['previews'] = $previews;
        null !== $price && $self['price'] = $price;
        null !== $queueID && $self['queueID'] = $queueID;
        null !== $rawText && $self['rawText'] = $rawText;
        null !== $releaseForms && $self['releaseForms'] = $releaseForms;
        null !== $responseType && $self['responseType'] = $responseType;
        null !== $scheduledAt && $self['scheduledAt'] = $scheduledAt;
        null !== $sentRulesExtra && $self['sentRulesExtra'] = $sentRulesExtra;
        null !== $sentRulesType && $self['sentRulesType'] = $sentRulesType;
        null !== $text && $self['text'] = $text;
        null !== $unsendSecondsQueue && $self['unsendSecondsQueue'] = $unsendSecondsQueue;
        null !== $userIDs && $self['userIDs'] = $userIDs;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCancelSeconds(int $cancelSeconds): self
    {
        $self = clone $this;
        $self['cancelSeconds'] = $cancelSeconds;

        return $self;
    }

    public function withCanPurchase(bool $canPurchase): self
    {
        $self = clone $this;
        $self['canPurchase'] = $canPurchase;

        return $self;
    }

    public function withCanUnsendQueue(bool $canUnsendQueue): self
    {
        $self = clone $this;
        $self['canUnsendQueue'] = $canUnsendQueue;

        return $self;
    }

    public function withChangedAt(string $changedAt): self
    {
        $self = clone $this;
        $self['changedAt'] = $changedAt;

        return $self;
    }

    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withGiphyID(string $giphyID): self
    {
        $self = clone $this;
        $self['giphyID'] = $giphyID;

        return $self;
    }

    public function withIsFree(bool $isFree): self
    {
        $self = clone $this;
        $self['isFree'] = $isFree;

        return $self;
    }

    public function withIsFromQueue(bool $isFromQueue): self
    {
        $self = clone $this;
        $self['isFromQueue'] = $isFromQueue;

        return $self;
    }

    public function withIsLiked(bool $isLiked): self
    {
        $self = clone $this;
        $self['isLiked'] = $isLiked;

        return $self;
    }

    public function withIsMarkdownDisabled(bool $isMarkdownDisabled): self
    {
        $self = clone $this;
        $self['isMarkdownDisabled'] = $isMarkdownDisabled;

        return $self;
    }

    public function withIsMediaReady(bool $isMediaReady): self
    {
        $self = clone $this;
        $self['isMediaReady'] = $isMediaReady;

        return $self;
    }

    public function withIsNew(bool $isNew): self
    {
        $self = clone $this;
        $self['isNew'] = $isNew;

        return $self;
    }

    public function withIsOpened(bool $isOpened): self
    {
        $self = clone $this;
        $self['isOpened'] = $isOpened;

        return $self;
    }

    public function withIsTip(bool $isTip): self
    {
        $self = clone $this;
        $self['isTip'] = $isTip;

        return $self;
    }

    public function withLockedText(bool $lockedText): self
    {
        $self = clone $this;
        $self['lockedText'] = $lockedText;

        return $self;
    }

    /**
     * @param list<mixed> $media
     */
    public function withMedia(array $media): self
    {
        $self = clone $this;
        $self['media'] = $media;

        return $self;
    }

    public function withMediaCount(int $mediaCount): self
    {
        $self = clone $this;
        $self['mediaCount'] = $mediaCount;

        return $self;
    }

    /**
     * @param list<mixed> $previews
     */
    public function withPreviews(array $previews): self
    {
        $self = clone $this;
        $self['previews'] = $previews;

        return $self;
    }

    public function withPrice(int $price): self
    {
        $self = clone $this;
        $self['price'] = $price;

        return $self;
    }

    public function withQueueID(int $queueID): self
    {
        $self = clone $this;
        $self['queueID'] = $queueID;

        return $self;
    }

    public function withRawText(string $rawText): self
    {
        $self = clone $this;
        $self['rawText'] = $rawText;

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

    public function withResponseType(string $responseType): self
    {
        $self = clone $this;
        $self['responseType'] = $responseType;

        return $self;
    }

    public function withScheduledAt(string $scheduledAt): self
    {
        $self = clone $this;
        $self['scheduledAt'] = $scheduledAt;

        return $self;
    }

    public function withSentRulesExtra(string $sentRulesExtra): self
    {
        $self = clone $this;
        $self['sentRulesExtra'] = $sentRulesExtra;

        return $self;
    }

    public function withSentRulesType(string $sentRulesType): self
    {
        $self = clone $this;
        $self['sentRulesType'] = $sentRulesType;

        return $self;
    }

    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }

    public function withUnsendSecondsQueue(int $unsendSecondsQueue): self
    {
        $self = clone $this;
        $self['unsendSecondsQueue'] = $unsendSecondsQueue;

        return $self;
    }

    /**
     * @param list<string> $userIDs
     */
    public function withUserIDs(array $userIDs): self
    {
        $self = clone $this;
        $self['userIDs'] = $userIDs;

        return $self;
    }
}
