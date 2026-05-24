<?php

declare(strict_types=1);

namespace Onlyfansapi\Chats\Messages;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Send a new message to a chat.
 *
 * @see Onlyfansapi\Services\Chats\MessagesService::send()
 *
 * @phpstan-type MessageSendParamsShape = array{
 *   account: string,
 *   text: string,
 *   lockedText?: bool|null,
 *   mediaFiles?: list<string>|null,
 *   previews?: list<string>|null,
 *   price?: int|null,
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
     * `new MessageSendParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessageSendParams::with(account: ..., text: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MessageSendParams)->withAccount(...)->withText(...)
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
     */
    public static function with(
        string $account,
        string $text,
        ?bool $lockedText = null,
        ?array $mediaFiles = null,
        ?array $previews = null,
        ?int $price = null,
    ): self {
        $self = new self;

        $self['account'] = $account;
        $self['text'] = $text;

        null !== $lockedText && $self['lockedText'] = $lockedText;
        null !== $mediaFiles && $self['mediaFiles'] = $mediaFiles;
        null !== $previews && $self['previews'] = $previews;
        null !== $price && $self['price'] = $price;

        return $self;
    }

    public function withAccount(string $account): self
    {
        $self = clone $this;
        $self['account'] = $account;

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
}
