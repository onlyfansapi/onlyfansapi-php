<?php

declare(strict_types=1);

namespace OnlyFansAPI\Settings\WelcomeMessage\WelcomeMessageUpdateResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Settings\WelcomeMessage\WelcomeMessageUpdateResponse\Data\Media;

/**
 * @phpstan-import-type MediaShape from \OnlyFansAPI\Settings\WelcomeMessage\WelcomeMessageUpdateResponse\Data\Media
 *
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   createdAt?: string|null,
 *   displayText?: string|null,
 *   giphyID?: string|null,
 *   isActive?: bool|null,
 *   isCouplePeopleMedia?: bool|null,
 *   isMarkdownDisabled?: bool|null,
 *   isMediaReady?: bool|null,
 *   lockedText?: bool|null,
 *   media?: list<Media|MediaShape>|null,
 *   mediaCount?: int|null,
 *   previews?: list<mixed>|null,
 *   price?: int|null,
 *   releaseForms?: list<mixed>|null,
 *   template?: string|null,
 *   text?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional]
    public ?string $createdAt;

    #[Optional]
    public ?string $displayText;

    #[Optional('giphyId', nullable: true)]
    public ?string $giphyID;

    #[Optional]
    public ?bool $isActive;

    #[Optional]
    public ?bool $isCouplePeopleMedia;

    #[Optional]
    public ?bool $isMarkdownDisabled;

    #[Optional]
    public ?bool $isMediaReady;

    #[Optional]
    public ?bool $lockedText;

    /** @var list<Media>|null $media */
    #[Optional(list: Media::class)]
    public ?array $media;

    #[Optional]
    public ?int $mediaCount;

    /** @var list<mixed>|null $previews */
    #[Optional(list: 'mixed')]
    public ?array $previews;

    #[Optional]
    public ?int $price;

    /** @var list<mixed>|null $releaseForms */
    #[Optional(list: 'mixed')]
    public ?array $releaseForms;

    #[Optional]
    public ?string $template;

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
     * @param list<Media|MediaShape>|null $media
     * @param list<mixed>|null $previews
     * @param list<mixed>|null $releaseForms
     */
    public static function with(
        ?string $id = null,
        ?string $createdAt = null,
        ?string $displayText = null,
        ?string $giphyID = null,
        ?bool $isActive = null,
        ?bool $isCouplePeopleMedia = null,
        ?bool $isMarkdownDisabled = null,
        ?bool $isMediaReady = null,
        ?bool $lockedText = null,
        ?array $media = null,
        ?int $mediaCount = null,
        ?array $previews = null,
        ?int $price = null,
        ?array $releaseForms = null,
        ?string $template = null,
        ?string $text = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $displayText && $self['displayText'] = $displayText;
        null !== $giphyID && $self['giphyID'] = $giphyID;
        null !== $isActive && $self['isActive'] = $isActive;
        null !== $isCouplePeopleMedia && $self['isCouplePeopleMedia'] = $isCouplePeopleMedia;
        null !== $isMarkdownDisabled && $self['isMarkdownDisabled'] = $isMarkdownDisabled;
        null !== $isMediaReady && $self['isMediaReady'] = $isMediaReady;
        null !== $lockedText && $self['lockedText'] = $lockedText;
        null !== $media && $self['media'] = $media;
        null !== $mediaCount && $self['mediaCount'] = $mediaCount;
        null !== $previews && $self['previews'] = $previews;
        null !== $price && $self['price'] = $price;
        null !== $releaseForms && $self['releaseForms'] = $releaseForms;
        null !== $template && $self['template'] = $template;
        null !== $text && $self['text'] = $text;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withDisplayText(string $displayText): self
    {
        $self = clone $this;
        $self['displayText'] = $displayText;

        return $self;
    }

    public function withGiphyID(?string $giphyID): self
    {
        $self = clone $this;
        $self['giphyID'] = $giphyID;

        return $self;
    }

    public function withIsActive(bool $isActive): self
    {
        $self = clone $this;
        $self['isActive'] = $isActive;

        return $self;
    }

    public function withIsCouplePeopleMedia(bool $isCouplePeopleMedia): self
    {
        $self = clone $this;
        $self['isCouplePeopleMedia'] = $isCouplePeopleMedia;

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

    public function withLockedText(bool $lockedText): self
    {
        $self = clone $this;
        $self['lockedText'] = $lockedText;

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

    public function withPrice(int $price): self
    {
        $self = clone $this;
        $self['price'] = $price;

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
}
