<?php

declare(strict_types=1);

namespace OnlyFansAPI\Chats\Messages;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Unlike a chat message.
 *
 * @see OnlyFansAPI\Services\Chats\MessagesService::unlike()
 *
 * @phpstan-type MessageUnlikeParamsShape = array{account: string, chatID: string}
 */
final class MessageUnlikeParams implements BaseModel
{
    /** @use SdkModel<MessageUnlikeParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    #[Required]
    public string $chatID;

    /**
     * `new MessageUnlikeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessageUnlikeParams::with(account: ..., chatID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MessageUnlikeParams)->withAccount(...)->withChatID(...)
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
