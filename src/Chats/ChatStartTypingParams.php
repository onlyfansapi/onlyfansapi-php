<?php

declare(strict_types=1);

namespace Onlyfansapi\Chats;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Calling this endpoint will show the target fan a "Model is typing..." note in the chat for ~4 seconds. If you want to continue showing the indicator call this endpoint multiple times. Free - no credits charged.
 *
 * @see Onlyfansapi\Services\ChatsService::startTyping()
 *
 * @phpstan-type ChatStartTypingParamsShape = array{account: string}
 */
final class ChatStartTypingParams implements BaseModel
{
    /** @use SdkModel<ChatStartTypingParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * `new ChatStartTypingParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ChatStartTypingParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ChatStartTypingParams)->withAccount(...)
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
