<?php

declare(strict_types=1);

namespace OnlyFansAPI\Chats;

use OnlyFansAPI\Chats\ChatListParams\Filter;
use OnlyFansAPI\Chats\ChatListParams\Order;
use OnlyFansAPI\Chats\ChatListParams\SkipUsers;
use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Get the list of chats for an Account.
 *
 * @see OnlyFansAPI\Services\ChatsService::list()
 *
 * @phpstan-type ChatListParamsShape = array{
 *   filter?: null|Filter|value-of<Filter>,
 *   limit?: string|null,
 *   offset?: string|null,
 *   order?: null|Order|value-of<Order>,
 *   query?: string|null,
 *   skipUsers?: null|SkipUsers|value-of<SkipUsers>,
 * }
 */
final class ChatListParams implements BaseModel
{
    /** @use SdkModel<ChatListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Optionally, filter the chats by type.
     *
     * @var value-of<Filter>|null $filter
     */
    #[Optional(enum: Filter::class)]
    public ?string $filter;

    /**
     * Number of chats to return (1 - 100). Default = 10.
     */
    #[Optional]
    public ?string $limit;

    /**
     * Number of chats to skip for pagination.
     */
    #[Optional]
    public ?string $offset;

    /**
     * Sort order for chats (recent or old). Default = recent.
     *
     * @var value-of<Order>|null $order
     */
    #[Optional(enum: Order::class)]
    public ?string $order;

    /**
     * Search query to filter chats.
     */
    #[Optional]
    public ?string $query;

    /**
     * Whether to skip user details in response (all or none). Default = all.
     *
     * @var value-of<SkipUsers>|null $skipUsers
     */
    #[Optional(enum: SkipUsers::class)]
    public ?string $skipUsers;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Filter|value-of<Filter>|null $filter
     * @param Order|value-of<Order>|null $order
     * @param SkipUsers|value-of<SkipUsers>|null $skipUsers
     */
    public static function with(
        Filter|string|null $filter = null,
        ?string $limit = null,
        ?string $offset = null,
        Order|string|null $order = null,
        ?string $query = null,
        SkipUsers|string|null $skipUsers = null,
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $limit && $self['limit'] = $limit;
        null !== $offset && $self['offset'] = $offset;
        null !== $order && $self['order'] = $order;
        null !== $query && $self['query'] = $query;
        null !== $skipUsers && $self['skipUsers'] = $skipUsers;

        return $self;
    }

    /**
     * Optionally, filter the chats by type.
     *
     * @param Filter|value-of<Filter> $filter
     */
    public function withFilter(Filter|string $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }

    /**
     * Number of chats to return (1 - 100). Default = 10.
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
     * Sort order for chats (recent or old). Default = recent.
     *
     * @param Order|value-of<Order> $order
     */
    public function withOrder(Order|string $order): self
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
     * Whether to skip user details in response (all or none). Default = all.
     *
     * @param SkipUsers|value-of<SkipUsers> $skipUsers
     */
    public function withSkipUsers(SkipUsers|string $skipUsers): self
    {
        $self = clone $this;
        $self['skipUsers'] = $skipUsers;

        return $self;
    }
}
