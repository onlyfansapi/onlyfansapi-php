<?php

declare(strict_types=1);

namespace Onlyfansapi\Engagement\Messages\DirectMessages;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * List sent direct messages with engagement stats (sent, viewed, purchased, etc.).
 *
 * @see Onlyfansapi\Services\Engagement\Messages\DirectMessagesService::list()
 *
 * @phpstan-type DirectMessageListParamsShape = array{
 *   endDate?: string|null,
 *   limit?: int|null,
 *   offset?: int|null,
 *   query?: string|null,
 *   startDate?: string|null,
 * }
 */
final class DirectMessageListParams implements BaseModel
{
    /** @use SdkModel<DirectMessageListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The latest message to retrieve. Keep empty to get all. MUST BE DATE AFTER `startDate`. This is also used for pagination.
     */
    #[Optional]
    public ?string $endDate;

    /**
     * Number of messages to return (default = 10).
     */
    #[Optional]
    public ?int $limit;

    /**
     * Optional offset for manual pagination.
     */
    #[Optional]
    public ?int $offset;

    /**
     * Optionally, filter by message text.
     */
    #[Optional]
    public ?string $query;

    /**
     * The earliest message to retrieve. Keep empty to get all.
     */
    #[Optional]
    public ?string $startDate;

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
        ?string $endDate = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $query = null,
        ?string $startDate = null,
    ): self {
        $self = new self;

        null !== $endDate && $self['endDate'] = $endDate;
        null !== $limit && $self['limit'] = $limit;
        null !== $offset && $self['offset'] = $offset;
        null !== $query && $self['query'] = $query;
        null !== $startDate && $self['startDate'] = $startDate;

        return $self;
    }

    /**
     * The latest message to retrieve. Keep empty to get all. MUST BE DATE AFTER `startDate`. This is also used for pagination.
     */
    public function withEndDate(string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * Number of messages to return (default = 10).
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Optional offset for manual pagination.
     */
    public function withOffset(int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }

    /**
     * Optionally, filter by message text.
     */
    public function withQuery(string $query): self
    {
        $self = clone $this;
        $self['query'] = $query;

        return $self;
    }

    /**
     * The earliest message to retrieve. Keep empty to get all.
     */
    public function withStartDate(string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }
}
