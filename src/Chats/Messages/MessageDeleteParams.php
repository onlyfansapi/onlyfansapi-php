<?php

declare(strict_types=1);

namespace Onlyfansapi\Chats\Messages;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Delete a message from a chat. Please note that ONLY messages sent less than 24 hours ago can be deleted.
 *
 * @see Onlyfansapi\Services\Chats\MessagesService::delete()
 *
 * @phpstan-type MessageDeleteParamsShape = array{account: string, chatID: string}
 */
final class MessageDeleteParams implements BaseModel
{
    /** @use SdkModel<MessageDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    #[Required]
    public string $chatID;

    /**
     * `new MessageDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessageDeleteParams::with(account: ..., chatID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MessageDeleteParams)->withAccount(...)->withChatID(...)
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
