<?php

declare(strict_types=1);

namespace Onlyfansapi\Chats\Messages;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Get messages from a specific chat.
 *
 * @see Onlyfansapi\Services\Chats\MessagesService::list()
 *
 * @phpstan-type MessageListParamsShape = array{
 *   account: string,
 *   id?: string|null,
 *   order?: string|null,
 *   skipUsers?: string|null,
 * }
 */
final class MessageListParams implements BaseModel
{
    /** @use SdkModel<MessageListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * ID of the last message from previous page. Used for pagination.
     */
    #[Optional]
    public ?string $id;

    /**
     * Sort order for messages (desc or asc).
     */
    #[Optional]
    public ?string $order;

    /**
     * Whether to skip user details (all or none).
     */
    #[Optional]
    public ?string $skipUsers;

    /**
     * `new MessageListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessageListParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MessageListParams)->withAccount(...)
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
    public static function with(
        string $account,
        ?string $id = null,
        ?string $order = null,
        ?string $skipUsers = null,
    ): self {
        $self = new self;

        $self['account'] = $account;

        null !== $id && $self['id'] = $id;
        null !== $order && $self['order'] = $order;
        null !== $skipUsers && $self['skipUsers'] = $skipUsers;

        return $self;
    }

    public function withAccount(string $account): self
    {
        $self = clone $this;
        $self['account'] = $account;

        return $self;
    }

    /**
     * ID of the last message from previous page. Used for pagination.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Sort order for messages (desc or asc).
     */
    public function withOrder(string $order): self
    {
        $self = clone $this;
        $self['order'] = $order;

        return $self;
    }

    /**
     * Whether to skip user details (all or none).
     */
    public function withSkipUsers(string $skipUsers): self
    {
        $self = clone $this;
        $self['skipUsers'] = $skipUsers;

        return $self;
    }
}
