<?php

declare(strict_types=1);

namespace Onlyfansapi\MassMessaging\MassMessagingGetOverviewResponse\Data;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\MassMessaging\MassMessagingGetOverviewResponse\Data\Item\Media;

/**
 * @phpstan-import-type MediaShape from \Onlyfansapi\MassMessaging\MassMessagingGetOverviewResponse\Data\Item\Media
 *
 * @phpstan-type ItemShape = array{
 *   id?: int|null,
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
 *   rawText?: string|null,
 *   responseType?: string|null,
 *   sentCount?: int|null,
 *   template?: string|null,
 *   text?: string|null,
 *   unsendSeconds?: int|null,
 *   viewedCount?: int|null,
 * }
 */
final class Item implements BaseModel
{
    /** @use SdkModel<ItemShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

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
    public ?string $rawText;

    #[Optional]
    public ?string $responseType;

    #[Optional]
    public ?int $sentCount;

    #[Optional]
    public ?string $template;

    #[Optional]
    public ?string $text;

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
     */
    public static function with(
        ?int $id = null,
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
        ?string $rawText = null,
        ?string $responseType = null,
        ?int $sentCount = null,
        ?string $template = null,
        ?string $text = null,
        ?int $unsendSeconds = null,
        ?int $viewedCount = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
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
        null !== $rawText && $self['rawText'] = $rawText;
        null !== $responseType && $self['responseType'] = $responseType;
        null !== $sentCount && $self['sentCount'] = $sentCount;
        null !== $template && $self['template'] = $template;
        null !== $text && $self['text'] = $text;
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

    public function withRawText(string $rawText): self
    {
        $self = clone $this;
        $self['rawText'] = $rawText;

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
