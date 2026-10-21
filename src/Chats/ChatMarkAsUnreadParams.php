<?php

declare(strict_types=1);

namespace OnlyFansAPI\Chats;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Mark a specific chat as unread.
 *
 * @see OnlyFansAPI\Services\ChatsService::markAsUnread()
 *
 * @phpstan-type ChatMarkAsUnreadParamsShape = array{account: string}
 */
final class ChatMarkAsUnreadParams implements BaseModel
{
    /** @use SdkModel<ChatMarkAsUnreadParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * `new ChatMarkAsUnreadParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ChatMarkAsUnreadParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ChatMarkAsUnreadParams)->withAccount(...)
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
