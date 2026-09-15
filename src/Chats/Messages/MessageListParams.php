<?php

declare(strict_types=1);

namespace OnlyFansAPI\Chats\Messages;

use OnlyFansAPI\Chats\Messages\MessageListParams\Filter;
use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Get messages from a specific chat.
 *
 * @see OnlyFansAPI\Services\Chats\MessagesService::list()
 *
 * @phpstan-type MessageListParamsShape = array{
 *   account: string,
 *   filter?: null|Filter|value-of<Filter>,
 *   firstID?: string|null,
 *   lastID?: string|null,
 *   limit?: string|null,
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
     * Filter by certain messages. Currently, only pins are filterable.
     *
     * @var value-of<Filter>|null $filter
     */
    #[Optional(enum: Filter::class)]
    public ?string $filter;

    /**
     * Use for pagination when `order=desc` (newest to oldest). Include this message ID as the first message in the results. Used to retrieve messages from e.g. the Search Chat Messages endpoint IDs.
     */
    #[Optional(nullable: true)]
    public ?string $firstID;

    /**
     * Use for pagination when `order=asc` (oldest to newest). Include this message ID as the first message in the results. WARNING! The response list of messages will also be inverted (oldest messages will be first, opposite to default where `order=desc`).
     */
    #[Optional(nullable: true)]
    public ?string $lastID;

    /**
     * The number of messages to return (default = 10, max = 100).
     */
    #[Optional]
    public ?string $limit;

    /**
     * Sort order for messages (desc or asc).
     */
    #[Optional]
    public ?string $order;

    /**
     * Whether to skip user details (`all` or `none`).
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
     *
     * @param Filter|value-of<Filter>|null $filter
     */
    public static function with(
        string $account,
        Filter|string|null $filter = null,
        ?string $firstID = null,
        ?string $lastID = null,
        ?string $limit = null,
        ?string $order = null,
        ?string $skipUsers = null,
    ): self {
        $self = new self;

        $self['account'] = $account;

        null !== $filter && $self['filter'] = $filter;
        null !== $firstID && $self['firstID'] = $firstID;
        null !== $lastID && $self['lastID'] = $lastID;
        null !== $limit && $self['limit'] = $limit;
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
     * Filter by certain messages. Currently, only pins are filterable.
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
     * Use for pagination when `order=desc` (newest to oldest). Include this message ID as the first message in the results. Used to retrieve messages from e.g. the Search Chat Messages endpoint IDs.
     */
    public function withFirstID(?string $firstID): self
    {
        $self = clone $this;
        $self['firstID'] = $firstID;

        return $self;
    }

    /**
     * Use for pagination when `order=asc` (oldest to newest). Include this message ID as the first message in the results. WARNING! The response list of messages will also be inverted (oldest messages will be first, opposite to default where `order=desc`).
     */
    public function withLastID(?string $lastID): self
    {
        $self = clone $this;
        $self['lastID'] = $lastID;

        return $self;
    }

    /**
     * The number of messages to return (default = 10, max = 100).
     */
    public function withLimit(string $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

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
     * Whether to skip user details (`all` or `none`).
     */
    public function withSkipUsers(string $skipUsers): self
    {
        $self = clone $this;
        $self['skipUsers'] = $skipUsers;

        return $self;
    }
}
