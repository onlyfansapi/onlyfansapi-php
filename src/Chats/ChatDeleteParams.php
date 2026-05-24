<?php

declare(strict_types=1);

namespace Onlyfansapi\Chats;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Delete a specific chat.
 *
 * @see Onlyfansapi\Services\ChatsService::delete()
 *
 * @phpstan-type ChatDeleteParamsShape = array{account: string}
 */
final class ChatDeleteParams implements BaseModel
{
    /** @use SdkModel<ChatDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * `new ChatDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ChatDeleteParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ChatDeleteParams)->withAccount(...)
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
