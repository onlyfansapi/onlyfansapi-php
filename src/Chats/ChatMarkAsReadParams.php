<?php

declare(strict_types=1);

namespace Onlyfansapi\Chats;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Mark a specific chat as read. Alternative to List Chat Messages endpoint, if you just want to mark the chat as read without fetching messages.
 *
 * @see Onlyfansapi\Services\ChatsService::markAsRead()
 *
 * @phpstan-type ChatMarkAsReadParamsShape = array{account: string}
 */
final class ChatMarkAsReadParams implements BaseModel
{
    /** @use SdkModel<ChatMarkAsReadParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * `new ChatMarkAsReadParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ChatMarkAsReadParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ChatMarkAsReadParams)->withAccount(...)
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
    public static function with(string $account): self
    {
        $self = new self;

        $self['account'] = $account;

        return $self;
    }

    public function withAccount(string $account): self
    {
        $self = clone $this;
        $self['account'] = $account;

        return $self;
    }
}
