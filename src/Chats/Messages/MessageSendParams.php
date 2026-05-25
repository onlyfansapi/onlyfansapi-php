<?php

declare(strict_types=1);

namespace OnlyFansAPI\Chats\Messages;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Send a new message to a chat.
 *
 * @see OnlyFansAPI\Services\Chats\MessagesService::send()
 *
 * @phpstan-type MessageSendParamsShape = array{
 *   account: string,
 *   giphyID?: string|null,
 *   lockedText?: bool|null,
 *   mediaFiles?: list<mixed>|null,
 *   previews?: list<mixed>|null,
 *   price?: int|null,
 *   replyToMessageID?: int|null,
 *   rfGuest?: string|null,
 *   rfPartner?: string|null,
 *   rfTag?: string|null,
 *   text?: string|null,
 * }
 */
final class MessageSendParams implements BaseModel
{
    /** @use SdkModel<MessageSendParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * The ID of the Giphy GIF to attach to the message. Get IDs from the Giphy listing endpoints (`/giphy/trending`, `/giphy/search`).
     */
    #[Optional('giphyId')]
    public ?string $giphyID;

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
     * Mark this message as a reply to another (can be either your own, or the recipient's).
     */
    #[Optional('replyToMessageId')]
    public ?int $replyToMessageID;

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
     * The message text content. Required unless a media file is present.
     */
    #[Optional]
    public ?string $text;

    /**
     * `new MessageSendParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessageSendParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MessageSendParams)->withAccount(...)
     * ```
     */
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
        string $account,
        ?string $giphyID = null,
        ?bool $lockedText = null,
        ?array $mediaFiles = null,
        ?array $previews = null,
        ?int $price = null,
        ?int $replyToMessageID = null,
        ?string $rfGuest = null,
        ?string $rfPartner = null,
        ?string $rfTag = null,
        ?string $text = null,
    ): self {
        $self = new self;

        $self['account'] = $account;

        null !== $giphyID && $self['giphyID'] = $giphyID;
        null !== $lockedText && $self['lockedText'] = $lockedText;
        null !== $mediaFiles && $self['mediaFiles'] = $mediaFiles;
        null !== $previews && $self['previews'] = $previews;
        null !== $price && $self['price'] = $price;
        null !== $replyToMessageID && $self['replyToMessageID'] = $replyToMessageID;
        null !== $rfGuest && $self['rfGuest'] = $rfGuest;
        null !== $rfPartner && $self['rfPartner'] = $rfPartner;
        null !== $rfTag && $self['rfTag'] = $rfTag;
        null !== $text && $self['text'] = $text;

        return $self;
    }

    public function withAccount(string $account): self
    {
        $self = clone $this;
        $self['account'] = $account;

        return $self;
    }

    /**
     * The ID of the Giphy GIF to attach to the message. Get IDs from the Giphy listing endpoints (`/giphy/trending`, `/giphy/search`).
     */
    public function withGiphyID(string $giphyID): self
    {
        $self = clone $this;
        $self['giphyID'] = $giphyID;

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
     * Mark this message as a reply to another (can be either your own, or the recipient's).
     */
    public function withReplyToMessageID(int $replyToMessageID): self
    {
        $self = clone $this;
        $self['replyToMessageID'] = $replyToMessageID;

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
     * The message text content. Required unless a media file is present.
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }
}
