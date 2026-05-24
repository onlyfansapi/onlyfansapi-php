<?php

declare(strict_types=1);

namespace Onlyfansapi\Chats;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Get the list of chats for an Account.
 *
 * @see Onlyfansapi\Services\ChatsService::list()
 *
 * @phpstan-type ChatListParamsShape = array{
 *   limit?: string|null,
 *   offset?: string|null,
 *   order?: string|null,
 *   query?: string|null,
 *   skipUsers?: string|null,
 * }
 */
final class ChatListParams implements BaseModel
{
    /** @use SdkModel<ChatListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Number of chats to return (10, 20, or 30).
     */
    #[Optional]
    public ?string $limit;

    /**
     * Number of chats to skip for pagination.
     */
    #[Optional]
    public ?string $offset;

    /**
     * Sort order for chats (recent or old).
     */
    #[Optional]
    public ?string $order;

    /**
     * Search query to filter chats.
     */
    #[Optional]
    public ?string $query;

    /**
     * Whether to skip user details in response (all or none).
     */
    #[Optional]
    public ?string $skipUsers;

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
        ?string $limit = null,
        ?string $offset = null,
        ?string $order = null,
        ?string $query = null,
        ?string $skipUsers = null,
    ): self {
        $self = new self;

        null !== $limit && $self['limit'] = $limit;
        null !== $offset && $self['offset'] = $offset;
        null !== $order && $self['order'] = $order;
        null !== $query && $self['query'] = $query;
        null !== $skipUsers && $self['skipUsers'] = $skipUsers;

        return $self;
    }

    /**
     * Number of chats to return (10, 20, or 30).
     */
    public function withLimit(string $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Number of chats to skip for pagination.
     */
    public function withOffset(string $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }

    /**
     * Sort order for chats (recent or old).
     */
    public function withOrder(string $order): self
    {
        $self = clone $this;
        $self['order'] = $order;

        return $self;
    }

    /**
     * Search query to filter chats.
     */
    public function withQuery(string $query): self
    {
        $self = clone $this;
        $self['query'] = $query;

        return $self;
    }

    /**
     * Whether to skip user details in response (all or none).
     */
    public function withSkipUsers(string $skipUsers): self
    {
        $self = clone $this;
        $self['skipUsers'] = $skipUsers;

        return $self;
    }
}
