<?php

declare(strict_types=1);

namespace Onlyfansapi\Engagement\Messages;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * List buyers for a specific message.
 *
 * @see Onlyfansapi\Services\Engagement\MessagesService::getMessageBuyers()
 *
 * @phpstan-type MessageGetMessageBuyersParamsShape = array{
 *   account: string,
 *   limit?: int|null,
 *   marker?: int|null,
 *   offset?: int|null,
 *   skipUsers?: string|null,
 *   skipUsersDups?: int|null,
 * }
 */
final class MessageGetMessageBuyersParams implements BaseModel
{
    /** @use SdkModel<MessageGetMessageBuyersParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * Number of buyers to return (default = 10).
     */
    #[Optional]
    public ?int $limit;

    /**
     * Marker for pagination.
     */
    #[Optional]
    public ?int $marker;

    /**
     * Offset for pagination (default = 0).
     */
    #[Optional]
    public ?int $offset;

    /**
     * Optional flag for subsequent pages (example: all).
     */
    #[Optional]
    public ?string $skipUsers;

    /**
     * Skip duplicate users in results (0/1). Default = 1.
     */
    #[Optional]
    public ?int $skipUsersDups;

    /**
     * `new MessageGetMessageBuyersParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessageGetMessageBuyersParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MessageGetMessageBuyersParams)->withAccount(...)
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
        ?int $limit = null,
        ?int $marker = null,
        ?int $offset = null,
        ?string $skipUsers = null,
        ?int $skipUsersDups = null,
    ): self {
        $self = new self;

        $self['account'] = $account;

        null !== $limit && $self['limit'] = $limit;
        null !== $marker && $self['marker'] = $marker;
        null !== $offset && $self['offset'] = $offset;
        null !== $skipUsers && $self['skipUsers'] = $skipUsers;
        null !== $skipUsersDups && $self['skipUsersDups'] = $skipUsersDups;

        return $self;
    }

    public function withAccount(string $account): self
    {
        $self = clone $this;
        $self['account'] = $account;

        return $self;
    }

    /**
     * Number of buyers to return (default = 10).
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Marker for pagination.
     */
    public function withMarker(int $marker): self
    {
        $self = clone $this;
        $self['marker'] = $marker;

        return $self;
    }

    /**
     * Offset for pagination (default = 0).
     */
    public function withOffset(int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }

    /**
     * Optional flag for subsequent pages (example: all).
     */
    public function withSkipUsers(string $skipUsers): self
    {
        $self = clone $this;
        $self['skipUsers'] = $skipUsers;

        return $self;
    }

    /**
     * Skip duplicate users in results (0/1). Default = 1.
     */
    public function withSkipUsersDups(int $skipUsersDups): self
    {
        $self = clone $this;
        $self['skipUsersDups'] = $skipUsersDups;

        return $self;
    }
}
