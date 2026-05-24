<?php

declare(strict_types=1);

namespace Onlyfansapi\Chats;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Hide a specific chat from the chat list. To unhide this chat, send a new message to the user.
 *
 * @see Onlyfansapi\Services\ChatsService::hide()
 *
 * @phpstan-type ChatHideParamsShape = array{account: string}
 */
final class ChatHideParams implements BaseModel
{
    /** @use SdkModel<ChatHideParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * `new ChatHideParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ChatHideParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ChatHideParams)->withAccount(...)
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
