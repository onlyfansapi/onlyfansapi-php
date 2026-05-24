<?php

declare(strict_types=1);

namespace Onlyfansapi\Chats\Messages\MessageListResponse;

use Onlyfansapi\Chats\Messages\MessageListResponse\Data\FromUser;
use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type FromUserShape from \Onlyfansapi\Chats\Messages\MessageListResponse\Data\FromUser
 *
 * @phpstan-type DataShape = array{
 *   id?: int|null,
 *   canBePinned?: bool|null,
 *   cancelSeconds?: int|null,
 *   canPurchase?: bool|null,
 *   canPurchaseReason?: string|null,
 *   canReport?: bool|null,
 *   changedAt?: string|null,
 *   createdAt?: string|null,
 *   fromUser?: null|FromUser|FromUserShape,
 *   giphyID?: string|null,
 *   isCouplePeopleMedia?: bool|null,
 *   isFree?: bool|null,
 *   isFromQueue?: bool|null,
 *   isLiked?: bool|null,
 *   isMarkdownDisabled?: bool|null,
 *   isMediaReady?: bool|null,
 *   isNew?: bool|null,
 *   isOpened?: bool|null,
 *   isPinned?: bool|null,
 *   isReportedByMe?: bool|null,
 *   isSentByMe?: bool|null,
 *   isTip?: bool|null,
 *   lockedText?: bool|null,
 *   media?: list<mixed>|null,
 *   mediaCount?: int|null,
 *   previews?: list<mixed>|null,
 *   price?: int|null,
 *   queueID?: int|null,
 *   releaseForms?: list<mixed>|null,
 *   responseType?: string|null,
 *   text?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional]
    public ?bool $canBePinned;

    #[Optional]
    public ?int $cancelSeconds;

    #[Optional]
    public ?bool $canPurchase;

    #[Optional]
    public ?string $canPurchaseReason;

    #[Optional]
    public ?bool $canReport;

    #[Optional]
    public ?string $changedAt;

    #[Optional]
    public ?string $createdAt;

    #[Optional]
    public ?FromUser $fromUser;

    #[Optional('giphyId')]
    public ?string $giphyID;

    #[Optional]
    public ?bool $isCouplePeopleMedia;

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
    public ?bool $isPinned;

    #[Optional]
    public ?bool $isReportedByMe;

    #[Optional]
    public ?bool $isSentByMe;

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

    /** @var list<mixed>|null $releaseForms */
    #[Optional(list: 'mixed')]
    public ?array $releaseForms;

    #[Optional]
    public ?string $responseType;

    #[Optional]
    public ?string $text;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param FromUser|FromUserShape|null $fromUser
     * @param list<mixed>|null $media
     * @param list<mixed>|null $previews
     * @param list<mixed>|null $releaseForms
     */
    public static function with(
        ?int $id = null,
        ?bool $canBePinned = null,
        ?int $cancelSeconds = null,
        ?bool $canPurchase = null,
        ?string $canPurchaseReason = null,
        ?bool $canReport = null,
        ?string $changedAt = null,
        ?string $createdAt = null,
        FromUser|array|null $fromUser = null,
        ?string $giphyID = null,
        ?bool $isCouplePeopleMedia = null,
        ?bool $isFree = null,
        ?bool $isFromQueue = null,
        ?bool $isLiked = null,
        ?bool $isMarkdownDisabled = null,
        ?bool $isMediaReady = null,
        ?bool $isNew = null,
        ?bool $isOpened = null,
        ?bool $isPinned = null,
        ?bool $isReportedByMe = null,
        ?bool $isSentByMe = null,
        ?bool $isTip = null,
        ?bool $lockedText = null,
        ?array $media = null,
        ?int $mediaCount = null,
        ?array $previews = null,
        ?int $price = null,
        ?int $queueID = null,
        ?array $releaseForms = null,
        ?string $responseType = null,
        ?string $text = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $canBePinned && $self['canBePinned'] = $canBePinned;
        null !== $cancelSeconds && $self['cancelSeconds'] = $cancelSeconds;
        null !== $canPurchase && $self['canPurchase'] = $canPurchase;
        null !== $canPurchaseReason && $self['canPurchaseReason'] = $canPurchaseReason;
        null !== $canReport && $self['canReport'] = $canReport;
        null !== $changedAt && $self['changedAt'] = $changedAt;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $fromUser && $self['fromUser'] = $fromUser;
        null !== $giphyID && $self['giphyID'] = $giphyID;
        null !== $isCouplePeopleMedia && $self['isCouplePeopleMedia'] = $isCouplePeopleMedia;
        null !== $isFree && $self['isFree'] = $isFree;
        null !== $isFromQueue && $self['isFromQueue'] = $isFromQueue;
        null !== $isLiked && $self['isLiked'] = $isLiked;
        null !== $isMarkdownDisabled && $self['isMarkdownDisabled'] = $isMarkdownDisabled;
        null !== $isMediaReady && $self['isMediaReady'] = $isMediaReady;
        null !== $isNew && $self['isNew'] = $isNew;
        null !== $isOpened && $self['isOpened'] = $isOpened;
        null !== $isPinned && $self['isPinned'] = $isPinned;
        null !== $isReportedByMe && $self['isReportedByMe'] = $isReportedByMe;
        null !== $isSentByMe && $self['isSentByMe'] = $isSentByMe;
        null !== $isTip && $self['isTip'] = $isTip;
        null !== $lockedText && $self['lockedText'] = $lockedText;
        null !== $media && $self['media'] = $media;
        null !== $mediaCount && $self['mediaCount'] = $mediaCount;
        null !== $previews && $self['previews'] = $previews;
        null !== $price && $self['price'] = $price;
        null !== $queueID && $self['queueID'] = $queueID;
        null !== $releaseForms && $self['releaseForms'] = $releaseForms;
        null !== $responseType && $self['responseType'] = $responseType;
        null !== $text && $self['text'] = $text;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCanBePinned(bool $canBePinned): self
    {
        $self = clone $this;
        $self['canBePinned'] = $canBePinned;

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

    public function withCanPurchaseReason(string $canPurchaseReason): self
    {
        $self = clone $this;
        $self['canPurchaseReason'] = $canPurchaseReason;

        return $self;
    }

    public function withCanReport(bool $canReport): self
    {
        $self = clone $this;
        $self['canReport'] = $canReport;

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

    /**
     * @param FromUser|FromUserShape $fromUser
     */
    public function withFromUser(FromUser|array $fromUser): self
    {
        $self = clone $this;
        $self['fromUser'] = $fromUser;

        return $self;
    }

    public function withGiphyID(string $giphyID): self
    {
        $self = clone $this;
        $self['giphyID'] = $giphyID;

        return $self;
    }

    public function withIsCouplePeopleMedia(bool $isCouplePeopleMedia): self
    {
        $self = clone $this;
        $self['isCouplePeopleMedia'] = $isCouplePeopleMedia;

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

    public function withIsPinned(bool $isPinned): self
    {
        $self = clone $this;
        $self['isPinned'] = $isPinned;

        return $self;
    }

    public function withIsReportedByMe(bool $isReportedByMe): self
    {
        $self = clone $this;
        $self['isReportedByMe'] = $isReportedByMe;

        return $self;
    }

    public function withIsSentByMe(bool $isSentByMe): self
    {
        $self = clone $this;
        $self['isSentByMe'] = $isSentByMe;

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

    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }
}
