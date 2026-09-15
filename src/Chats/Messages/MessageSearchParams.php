<?php

declare(strict_types=1);

namespace OnlyFansAPI\Chats\Messages;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Search messages in a specific chat. Returns a list of message IDs matching the search query.
 *
 * @see OnlyFansAPI\Services\Chats\MessagesService::search()
 *
 * @phpstan-type MessageSearchParamsShape = array{account: string, query: string}
 */
final class MessageSearchParams implements BaseModel
{
    /** @use SdkModel<MessageSearchParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * The query search in messages.
     */
    #[Required]
    public string $query;

    /**
     * `new MessageSearchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessageSearchParams::with(account: ..., query: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MessageSearchParams)->withAccount(...)->withQuery(...)
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
    public static function with(string $account, string $query): self
    {
        $self = new self;

        $self['account'] = $account;
        $self['query'] = $query;

        return $self;
    }

    public function withAccount(string $account): self
    {
        $self = clone $this;
        $self['account'] = $account;

        return $self;
    }

    /**
     * The query search in messages.
     */
    public function withQuery(string $query): self
    {
        $self = clone $this;
        $self['query'] = $query;

        return $self;
    }
}
