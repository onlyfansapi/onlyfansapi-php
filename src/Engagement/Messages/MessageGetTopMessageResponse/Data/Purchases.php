<?php

declare(strict_types=1);

namespace OnlyFansAPI\Engagement\Messages\MessageGetTopMessageResponse\Data;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Engagement\Messages\MessageGetTopMessageResponse\Data\Purchases\Media;
use OnlyFansAPI\Engagement\Messages\MessageGetTopMessageResponse\Data\Purchases\Relationships;

/**
 * @phpstan-import-type MediaShape from \OnlyFansAPI\Engagement\Messages\MessageGetTopMessageResponse\Data\Purchases\Media
 * @phpstan-import-type RelationshipsShape from \OnlyFansAPI\Engagement\Messages\MessageGetTopMessageResponse\Data\Purchases\Relationships
 *
 * @phpstan-type PurchasesShape = array{
 *   id?: int|null,
 *   canSendMessageToBuyers?: bool|null,
 *   canUnsend?: bool|null,
 *   date?: string|null,
 *   giphyID?: string|null,
 *   isCanceled?: bool|null,
 *   isFree?: bool|null,
 *   isMediaReady?: bool|null,
 *   isReportedByMe?: bool|null,
 *   isTip?: bool|null,
 *   media?: list<Media|MediaShape>|null,
 *   mediaCount?: int|null,
 *   previews?: list<mixed>|null,
 *   price?: string|null,
 *   purchasedCount?: int|null,
 *   rawText?: string|null,
 *   relationships?: null|Relationships|RelationshipsShape,
 *   responseType?: string|null,
 *   sentCount?: int|null,
 *   template?: string|null,
 *   text?: string|null,
 *   totalRevenueGenerated?: string|null,
 *   unsendSeconds?: int|null,
 *   viewedCount?: int|null,
 * }
 */
final class Purchases implements BaseModel
{
    /** @use SdkModel<PurchasesShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional]
    public ?bool $canSendMessageToBuyers;

    #[Optional]
    public ?bool $canUnsend;

    #[Optional]
    public ?string $date;

    #[Optional('giphyId', nullable: true)]
    public ?string $giphyID;

    #[Optional]
    public ?bool $isCanceled;

    #[Optional]
    public ?bool $isFree;

    #[Optional]
    public ?bool $isMediaReady;

    #[Optional]
    public ?bool $isReportedByMe;

    #[Optional]
    public ?bool $isTip;

    /** @var list<Media>|null $media */
    #[Optional(list: Media::class)]
    public ?array $media;

    #[Optional]
    public ?int $mediaCount;

    /** @var list<mixed>|null $previews */
    #[Optional(list: 'mixed')]
    public ?array $previews;

    #[Optional]
    public ?string $price;

    #[Optional]
    public ?int $purchasedCount;

    #[Optional]
    public ?string $rawText;

    #[Optional]
    public ?Relationships $relationships;

    #[Optional]
    public ?string $responseType;

    #[Optional]
    public ?int $sentCount;

    #[Optional]
    public ?string $template;

    #[Optional]
    public ?string $text;

    #[Optional]
    public ?string $totalRevenueGenerated;

    #[Optional]
    public ?int $unsendSeconds;

    #[Optional]
    public ?int $viewedCount;

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
     * @param list<mixed>|null $previews
     * @param Relationships|RelationshipsShape|null $relationships
     */
    public static function with(
        ?int $id = null,
        ?bool $canSendMessageToBuyers = null,
        ?bool $canUnsend = null,
        ?string $date = null,
        ?string $giphyID = null,
        ?bool $isCanceled = null,
        ?bool $isFree = null,
        ?bool $isMediaReady = null,
        ?bool $isReportedByMe = null,
        ?bool $isTip = null,
        ?array $media = null,
        ?int $mediaCount = null,
        ?array $previews = null,
        ?string $price = null,
        ?int $purchasedCount = null,
        ?string $rawText = null,
        Relationships|array|null $relationships = null,
        ?string $responseType = null,
        ?int $sentCount = null,
        ?string $template = null,
        ?string $text = null,
        ?string $totalRevenueGenerated = null,
        ?int $unsendSeconds = null,
        ?int $viewedCount = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $canSendMessageToBuyers && $self['canSendMessageToBuyers'] = $canSendMessageToBuyers;
        null !== $canUnsend && $self['canUnsend'] = $canUnsend;
        null !== $date && $self['date'] = $date;
        null !== $giphyID && $self['giphyID'] = $giphyID;
        null !== $isCanceled && $self['isCanceled'] = $isCanceled;
        null !== $isFree && $self['isFree'] = $isFree;
        null !== $isMediaReady && $self['isMediaReady'] = $isMediaReady;
        null !== $isReportedByMe && $self['isReportedByMe'] = $isReportedByMe;
        null !== $isTip && $self['isTip'] = $isTip;
        null !== $media && $self['media'] = $media;
        null !== $mediaCount && $self['mediaCount'] = $mediaCount;
        null !== $previews && $self['previews'] = $previews;
        null !== $price && $self['price'] = $price;
        null !== $purchasedCount && $self['purchasedCount'] = $purchasedCount;
        null !== $rawText && $self['rawText'] = $rawText;
        null !== $relationships && $self['relationships'] = $relationships;
        null !== $responseType && $self['responseType'] = $responseType;
        null !== $sentCount && $self['sentCount'] = $sentCount;
        null !== $template && $self['template'] = $template;
        null !== $text && $self['text'] = $text;
        null !== $totalRevenueGenerated && $self['totalRevenueGenerated'] = $totalRevenueGenerated;
        null !== $unsendSeconds && $self['unsendSeconds'] = $unsendSeconds;
        null !== $viewedCount && $self['viewedCount'] = $viewedCount;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCanSendMessageToBuyers(
        bool $canSendMessageToBuyers
    ): self {
        $self = clone $this;
        $self['canSendMessageToBuyers'] = $canSendMessageToBuyers;

        return $self;
    }

    public function withCanUnsend(bool $canUnsend): self
    {
        $self = clone $this;
        $self['canUnsend'] = $canUnsend;

        return $self;
    }

    public function withDate(string $date): self
    {
        $self = clone $this;
        $self['date'] = $date;

        return $self;
    }

    public function withGiphyID(?string $giphyID): self
    {
        $self = clone $this;
        $self['giphyID'] = $giphyID;

        return $self;
    }

    public function withIsCanceled(bool $isCanceled): self
    {
        $self = clone $this;
        $self['isCanceled'] = $isCanceled;

        return $self;
    }

    public function withIsFree(bool $isFree): self
    {
        $self = clone $this;
        $self['isFree'] = $isFree;

        return $self;
    }

    public function withIsMediaReady(bool $isMediaReady): self
    {
        $self = clone $this;
        $self['isMediaReady'] = $isMediaReady;

        return $self;
    }

    public function withIsReportedByMe(bool $isReportedByMe): self
    {
        $self = clone $this;
        $self['isReportedByMe'] = $isReportedByMe;

        return $self;
    }

    public function withIsTip(bool $isTip): self
    {
        $self = clone $this;
        $self['isTip'] = $isTip;

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

    public function withPrice(string $price): self
    {
        $self = clone $this;
        $self['price'] = $price;

        return $self;
    }

    public function withPurchasedCount(int $purchasedCount): self
    {
        $self = clone $this;
        $self['purchasedCount'] = $purchasedCount;

        return $self;
    }

    public function withRawText(string $rawText): self
    {
        $self = clone $this;
        $self['rawText'] = $rawText;

        return $self;
    }

    /**
     * @param Relationships|RelationshipsShape $relationships
     */
    public function withRelationships(Relationships|array $relationships): self
    {
        $self = clone $this;
        $self['relationships'] = $relationships;

        return $self;
    }

    public function withResponseType(string $responseType): self
    {
        $self = clone $this;
        $self['responseType'] = $responseType;

        return $self;
    }

    public function withSentCount(int $sentCount): self
    {
        $self = clone $this;
        $self['sentCount'] = $sentCount;

        return $self;
    }

    public function withTemplate(string $template): self
    {
        $self = clone $this;
        $self['template'] = $template;

        return $self;
    }

    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }

    public function withTotalRevenueGenerated(
        string $totalRevenueGenerated
    ): self {
        $self = clone $this;
        $self['totalRevenueGenerated'] = $totalRevenueGenerated;

        return $self;
    }

    public function withUnsendSeconds(int $unsendSeconds): self
    {
        $self = clone $this;
        $self['unsendSeconds'] = $unsendSeconds;

        return $self;
    }

    public function withViewedCount(int $viewedCount): self
    {
        $self = clone $this;
        $self['viewedCount'] = $viewedCount;

        return $self;
    }
}
