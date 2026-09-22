<?php

declare(strict_types=1);

namespace OnlyFansAPI\Chats\Messages;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Pin a message from a chat. Requires API-key write permission. No request body is needed. Use [List Pinned Chat Messages](https://docs.onlyfansapi.com/api-reference/chat-messages/list-pinned-chat-messages) to read the current pins.
 *
 * @see OnlyFansAPI\Services\Chats\MessagesService::pin()
 *
 * @phpstan-type MessagePinParamsShape = array{account: string, chatID: string}
 */
final class MessagePinParams implements BaseModel
{
    /** @use SdkModel<MessagePinParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    #[Required]
    public string $chatID;

    /**
     * `new MessagePinParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessagePinParams::with(account: ..., chatID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MessagePinParams)->withAccount(...)->withChatID(...)
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
     */
    public static function with(string $account, string $chatID): self
    {
        $self = new self;

        $self['account'] = $account;
        $self['chatID'] = $chatID;

        return $self;
    }

    public function withAccount(string $account): self
    {
        $self = clone $this;
        $self['account'] = $account;

        return $self;
    }

    public function withChatID(string $chatID): self
    {
        $self = clone $this;
        $self['chatID'] = $chatID;

        return $self;
    }
}
