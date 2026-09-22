<?php

declare(strict_types=1);

namespace OnlyFansAPI\MassMessaging\MassMessagingDeleteResponse\Data;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type QueueShape = array{
 *   id?: int|null,
 *   canUnsend?: bool|null,
 *   date?: string|null,
 *   giphyID?: string|null,
 *   hasError?: bool|null,
 *   isCanceled?: bool|null,
 *   isFree?: bool|null,
 *   mediaTypes?: string|null,
 *   releaseForms?: list<mixed>|null,
 *   sentCount?: int|null,
 *   text?: string|null,
 *   textCropped?: string|null,
 *   unsendSeconds?: int|null,
 *   viewedCount?: int|null,
 * }
 */
final class Queue implements BaseModel
{
    /** @use SdkModel<QueueShape> */
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
    public ?bool $hasError;

    #[Optional]
    public ?bool $isCanceled;

    #[Optional]
    public ?bool $isFree;

    #[Optional(nullable: true)]
    public ?string $mediaTypes;

    /** @var list<mixed>|null $releaseForms */
    #[Optional(list: 'mixed')]
    public ?array $releaseForms;

    #[Optional]
    public ?int $sentCount;

    #[Optional]
    public ?string $text;

    #[Optional]
    public ?string $textCropped;

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
     * @param list<mixed>|null $releaseForms
     */
    public static function with(
        ?int $id = null,
        ?bool $canUnsend = null,
        ?string $date = null,
        ?string $giphyID = null,
        ?bool $hasError = null,
        ?bool $isCanceled = null,
        ?bool $isFree = null,
        ?string $mediaTypes = null,
        ?array $releaseForms = null,
        ?int $sentCount = null,
        ?string $text = null,
        ?string $textCropped = null,
        ?int $unsendSeconds = null,
        ?int $viewedCount = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $canUnsend && $self['canUnsend'] = $canUnsend;
        null !== $date && $self['date'] = $date;
        null !== $giphyID && $self['giphyID'] = $giphyID;
        null !== $hasError && $self['hasError'] = $hasError;
        null !== $isCanceled && $self['isCanceled'] = $isCanceled;
        null !== $isFree && $self['isFree'] = $isFree;
        null !== $mediaTypes && $self['mediaTypes'] = $mediaTypes;
        null !== $releaseForms && $self['releaseForms'] = $releaseForms;
        null !== $sentCount && $self['sentCount'] = $sentCount;
        null !== $text && $self['text'] = $text;
        null !== $textCropped && $self['textCropped'] = $textCropped;
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

    public function withHasError(bool $hasError): self
    {
        $self = clone $this;
        $self['hasError'] = $hasError;

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

    public function withMediaTypes(?string $mediaTypes): self
    {
        $self = clone $this;
        $self['mediaTypes'] = $mediaTypes;

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

    public function withSentCount(int $sentCount): self
    {
        $self = clone $this;
        $self['sentCount'] = $sentCount;

        return $self;
    }

    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }

    public function withTextCropped(string $textCropped): self
    {
        $self = clone $this;
        $self['textCropped'] = $textCropped;

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
