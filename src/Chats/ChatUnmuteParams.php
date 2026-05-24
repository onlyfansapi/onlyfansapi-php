<?php

declare(strict_types=1);

namespace Onlyfansapi\Chats;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Unmute notifications for a specific chat.
 *
 * @see Onlyfansapi\Services\ChatsService::unmute()
 *
 * @phpstan-type ChatUnmuteParamsShape = array{account: string}
 */
final class ChatUnmuteParams implements BaseModel
{
    /** @use SdkModel<ChatUnmuteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * `new ChatUnmuteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ChatUnmuteParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ChatUnmuteParams)->withAccount(...)
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
