<?php

declare(strict_types=1);

namespace OnlyFansAPI\Settings\WelcomeMessage;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Update the automatic welcome message template that is sent when someone subscribes.
 *
 * @see OnlyFansAPI\Services\Settings\WelcomeMessageService::update()
 *
 * @phpstan-type WelcomeMessageUpdateParamsShape = array{
 *   isForward?: bool|null,
 *   lockedText?: bool|null,
 *   mediaFiles?: list<mixed>|null,
 *   previews?: list<mixed>|null,
 *   price?: int|null,
 *   rfGuest?: string|null,
 *   rfPartner?: string|null,
 *   rfTag?: string|null,
 *   text?: string|null,
 * }
 */
final class WelcomeMessageUpdateParams implements BaseModel
{
    /** @use SdkModel<WelcomeMessageUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?bool $isForward;

    /**
     * Whether the text should be shown or hidden.
     */
    #[Optional]
    public ?bool $lockedText;

    /**
     * Direct file uploads, OFAPI `ofapi_media_` IDs, or OF vault IDs. Will be hidden if `price` is provided.
     *
     * @var list<mixed>|null $mediaFiles
     */
    #[Optional(list: 'mixed')]
    public ?array $mediaFiles;

    /**
     * Direct file uploads, OFAPI `ofapi_media_` IDs, OF vault IDs, or integer indices referencing uploaded files in `mediaFiles`. Will be shown if `price` is provided.
     *
     * @var list<mixed>|null $previews
     */
    #[Optional(list: 'mixed')]
    public ?array $previews;

    /**
     * Price for paid content (0 or between 3-200). In case this is not zero, **mediaFiles** is required.
     */
    #[Optional]
    public ?int $price;

    /**
     * Array of OnlyFans Release Form Guest IDs to tag in your message.
     */
    #[Optional]
    public ?string $rfGuest;

    /**
     * Array of OnlyFans Release Form Partners IDs to tag in your message.
     */
    #[Optional]
    public ?string $rfPartner;

    /**
     * Array of OnlyFans Creator User IDs to tag in your message.
     */
    #[Optional]
    public ?string $rfTag;

    /**
     * The welcome message text content. Required unless a media file is present.
     */
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
     * @param list<mixed>|null $mediaFiles
     * @param list<mixed>|null $previews
     */
    public static function with(
        ?bool $isForward = null,
        ?bool $lockedText = null,
        ?array $mediaFiles = null,
        ?array $previews = null,
        ?int $price = null,
        ?string $rfGuest = null,
        ?string $rfPartner = null,
        ?string $rfTag = null,
        ?string $text = null,
    ): self {
        $self = new self;

        null !== $isForward && $self['isForward'] = $isForward;
        null !== $lockedText && $self['lockedText'] = $lockedText;
        null !== $mediaFiles && $self['mediaFiles'] = $mediaFiles;
        null !== $previews && $self['previews'] = $previews;
        null !== $price && $self['price'] = $price;
        null !== $rfGuest && $self['rfGuest'] = $rfGuest;
        null !== $rfPartner && $self['rfPartner'] = $rfPartner;
        null !== $rfTag && $self['rfTag'] = $rfTag;
        null !== $text && $self['text'] = $text;

        return $self;
    }

    public function withIsForward(bool $isForward): self
    {
        $self = clone $this;
        $self['isForward'] = $isForward;

        return $self;
    }

    /**
     * Whether the text should be shown or hidden.
     */
    public function withLockedText(bool $lockedText): self
    {
        $self = clone $this;
        $self['lockedText'] = $lockedText;

        return $self;
    }

    /**
     * Direct file uploads, OFAPI `ofapi_media_` IDs, or OF vault IDs. Will be hidden if `price` is provided.
     *
     * @param list<mixed> $mediaFiles
     */
    public function withMediaFiles(array $mediaFiles): self
    {
        $self = clone $this;
        $self['mediaFiles'] = $mediaFiles;

        return $self;
    }

    /**
     * Direct file uploads, OFAPI `ofapi_media_` IDs, OF vault IDs, or integer indices referencing uploaded files in `mediaFiles`. Will be shown if `price` is provided.
     *
     * @param list<mixed> $previews
     */
    public function withPreviews(array $previews): self
    {
        $self = clone $this;
        $self['previews'] = $previews;

        return $self;
    }

    /**
     * Price for paid content (0 or between 3-200). In case this is not zero, **mediaFiles** is required.
     */
    public function withPrice(int $price): self
    {
        $self = clone $this;
        $self['price'] = $price;

        return $self;
    }

    /**
     * Array of OnlyFans Release Form Guest IDs to tag in your message.
     */
    public function withRfGuest(string $rfGuest): self
    {
        $self = clone $this;
        $self['rfGuest'] = $rfGuest;

        return $self;
    }

    /**
     * Array of OnlyFans Release Form Partners IDs to tag in your message.
     */
    public function withRfPartner(string $rfPartner): self
    {
        $self = clone $this;
        $self['rfPartner'] = $rfPartner;

        return $self;
    }

    /**
     * Array of OnlyFans Creator User IDs to tag in your message.
     */
    public function withRfTag(string $rfTag): self
    {
        $self = clone $this;
        $self['rfTag'] = $rfTag;

        return $self;
    }

    /**
     * The welcome message text content. Required unless a media file is present.
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }
}
