<?php

declare(strict_types=1);

namespace OnlyFansAPI\MassMessaging;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Send a mass message to lists and/or users. You may use both the `userLists` and `userIds` parameters to send the same message to both lists and individual users.
 *
 * @see OnlyFansAPI\Services\MassMessagingService::send()
 *
 * @phpstan-type MassMessagingSendParamsShape = array{
 *   text: string,
 *   excludedLists?: list<string>|null,
 *   giphyID?: string|null,
 *   lockedText?: bool|null,
 *   mediaFiles?: list<mixed>|null,
 *   previews?: list<mixed>|null,
 *   price?: int|null,
 *   rfGuest?: string|null,
 *   rfPartner?: string|null,
 *   rfTag?: string|null,
 *   saveForLater?: bool|null,
 *   scheduledDate?: string|null,
 *   userIDs?: list<string>|null,
 *   userLists?: list<string>|null,
 * }
 */
final class MassMessagingSendParams implements BaseModel
{
    /** @use SdkModel<MassMessagingSendParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The message text content.
     */
    #[Required]
    public string $text;

    /**
     * Array of user list IDs that the mass message will NOT be sent to.
     *
     * @var list<string>|null $excludedLists
     */
    #[Optional(list: 'string')]
    public ?array $excludedLists;

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
     * Array of OnlyFans Release Form Guest IDs to tag in your mass message.
     */
    #[Optional]
    public ?string $rfGuest;

    /**
     * Array of OnlyFans Release Form Partners IDs to tag in your mass message.
     */
    #[Optional]
    public ?string $rfPartner;

    /**
     * Array of OnlyFans Creator User IDs to tag in your mass message.
     */
    #[Optional]
    public ?string $rfTag;

    /**
     * Add your message to the "Saved for later" queue.
     */
    #[Optional]
    public ?bool $saveForLater;

    /**
     * Schedule the chat message in the future (UTC timezone).
     */
    #[Optional]
    public ?string $scheduledDate;

    /**
     * Array of user IDs that the mass message will be sent to.
     *
     * @var list<string>|null $userIDs
     */
    #[Optional('userIds', list: 'string')]
    public ?array $userIDs;

    /**
     * Array of user list IDs that the mass message will be sent to.
     *
     * @var list<string>|null $userLists
     */
    #[Optional(list: 'string')]
    public ?array $userLists;

    /**
     * `new MassMessagingSendParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MassMessagingSendParams::with(text: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MassMessagingSendParams)->withText(...)
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
     * @param list<string>|null $excludedLists
     * @param list<mixed>|null $mediaFiles
     * @param list<mixed>|null $previews
     * @param list<string>|null $userIDs
     * @param list<string>|null $userLists
     */
    public static function with(
        string $text,
        ?array $excludedLists = null,
        ?string $giphyID = null,
        ?bool $lockedText = null,
        ?array $mediaFiles = null,
        ?array $previews = null,
        ?int $price = null,
        ?string $rfGuest = null,
        ?string $rfPartner = null,
        ?string $rfTag = null,
        ?bool $saveForLater = null,
        ?string $scheduledDate = null,
        ?array $userIDs = null,
        ?array $userLists = null,
    ): self {
        $self = new self;

        $self['text'] = $text;

        null !== $excludedLists && $self['excludedLists'] = $excludedLists;
        null !== $giphyID && $self['giphyID'] = $giphyID;
        null !== $lockedText && $self['lockedText'] = $lockedText;
        null !== $mediaFiles && $self['mediaFiles'] = $mediaFiles;
        null !== $previews && $self['previews'] = $previews;
        null !== $price && $self['price'] = $price;
        null !== $rfGuest && $self['rfGuest'] = $rfGuest;
        null !== $rfPartner && $self['rfPartner'] = $rfPartner;
        null !== $rfTag && $self['rfTag'] = $rfTag;
        null !== $saveForLater && $self['saveForLater'] = $saveForLater;
        null !== $scheduledDate && $self['scheduledDate'] = $scheduledDate;
        null !== $userIDs && $self['userIDs'] = $userIDs;
        null !== $userLists && $self['userLists'] = $userLists;

        return $self;
    }

    /**
     * The message text content.
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }

    /**
     * Array of user list IDs that the mass message will NOT be sent to.
     *
     * @param list<string> $excludedLists
     */
    public function withExcludedLists(array $excludedLists): self
    {
        $self = clone $this;
        $self['excludedLists'] = $excludedLists;

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
     * Array of OnlyFans Release Form Guest IDs to tag in your mass message.
     */
    public function withRfGuest(string $rfGuest): self
    {
        $self = clone $this;
        $self['rfGuest'] = $rfGuest;

        return $self;
    }

    /**
     * Array of OnlyFans Release Form Partners IDs to tag in your mass message.
     */
    public function withRfPartner(string $rfPartner): self
    {
        $self = clone $this;
        $self['rfPartner'] = $rfPartner;

        return $self;
    }

    /**
     * Array of OnlyFans Creator User IDs to tag in your mass message.
     */
    public function withRfTag(string $rfTag): self
    {
        $self = clone $this;
        $self['rfTag'] = $rfTag;

        return $self;
    }

    /**
     * Add your message to the "Saved for later" queue.
     */
    public function withSaveForLater(bool $saveForLater): self
    {
        $self = clone $this;
        $self['saveForLater'] = $saveForLater;

        return $self;
    }

    /**
     * Schedule the chat message in the future (UTC timezone).
     */
    public function withScheduledDate(string $scheduledDate): self
    {
        $self = clone $this;
        $self['scheduledDate'] = $scheduledDate;

        return $self;
    }

    /**
     * Array of user IDs that the mass message will be sent to.
     *
     * @param list<string> $userIDs
     */
    public function withUserIDs(array $userIDs): self
    {
        $self = clone $this;
        $self['userIDs'] = $userIDs;

        return $self;
    }

    /**
     * Array of user list IDs that the mass message will be sent to.
     *
     * @param list<string> $userLists
     */
    public function withUserLists(array $userLists): self
    {
        $self = clone $this;
        $self['userLists'] = $userLists;

        return $self;
    }
}
