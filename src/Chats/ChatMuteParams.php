<?php

declare(strict_types=1);

namespace Onlyfansapi\Chats;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Mute notifications for a specific chat.
 *
 * @see Onlyfansapi\Services\ChatsService::mute()
 *
 * @phpstan-type ChatMuteParamsShape = array{account: string}
 */
final class ChatMuteParams implements BaseModel
{
    /** @use SdkModel<ChatMuteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * `new ChatMuteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ChatMuteParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ChatMuteParams)->withAccount(...)
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
