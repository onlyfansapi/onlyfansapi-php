<?php

declare(strict_types=1);

namespace Onlyfansapi\MassMessaging;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Send a mass message to lists and/or users. You may use both the `userLists` and `userIds` parameters to send the same message to both lists and individual users.
 *
 * @see Onlyfansapi\Services\MassMessagingService::send()
 *
 * @phpstan-type MassMessagingSendParamsShape = array{
 *   text: string,
 *   lockedText?: bool|null,
 *   mediaFiles?: list<string>|null,
 *   previews?: list<string>|null,
 *   price?: int|null,
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
     * Whether the text should be shown or hidden.
     */
    #[Optional]
    public ?bool $lockedText;

    /**
     * Array of media file upload prefixed_ids, or OF media IDs (required if price is not 0). Will be hidden if `price` is provided.
     *
     * @var list<string>|null $mediaFiles
     */
    #[Optional(list: 'string')]
    public ?array $mediaFiles;

    /**
     * Array of media file upload prefixed_ids, or OF media IDs (required if price is not 0). Will be shown if `price` is provided. All `previews` values must also exist in the `mediaFiles` array.
     *
     * @var list<string>|null $previews
     */
    #[Optional(list: 'string')]
    public ?array $previews;

    /**
     * Price for paid content (0 or between 3-200). In case this is not zero, **mediaFiles** is required.
     */
    #[Optional]
    public ?int $price;

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
     * @param list<string>|null $mediaFiles
     * @param list<string>|null $previews
     * @param list<string>|null $userIDs
     * @param list<string>|null $userLists
     */
    public static function with(
        string $text,
        ?bool $lockedText = null,
        ?array $mediaFiles = null,
        ?array $previews = null,
        ?int $price = null,
        ?bool $saveForLater = null,
        ?string $scheduledDate = null,
        ?array $userIDs = null,
        ?array $userLists = null,
    ): self {
        $self = new self;

        $self['text'] = $text;

        null !== $lockedText && $self['lockedText'] = $lockedText;
        null !== $mediaFiles && $self['mediaFiles'] = $mediaFiles;
        null !== $previews && $self['previews'] = $previews;
        null !== $price && $self['price'] = $price;
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
     * Whether the text should be shown or hidden.
     */
    public function withLockedText(bool $lockedText): self
    {
        $self = clone $this;
        $self['lockedText'] = $lockedText;

        return $self;
    }

    /**
     * Array of media file upload prefixed_ids, or OF media IDs (required if price is not 0). Will be hidden if `price` is provided.
     *
     * @param list<string> $mediaFiles
     */
    public function withMediaFiles(array $mediaFiles): self
    {
        $self = clone $this;
        $self['mediaFiles'] = $mediaFiles;

        return $self;
    }

    /**
     * Array of media file upload prefixed_ids, or OF media IDs (required if price is not 0). Will be shown if `price` is provided. All `previews` values must also exist in the `mediaFiles` array.
     *
     * @param list<string> $previews
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
