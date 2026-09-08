<?php

declare(strict_types=1);

namespace OnlyFansAPI\Transactions;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Get a paginated list of transactions for an Account. Newest transactions are first. You can filter by transaction type and tips source.
 *
 * @see OnlyFansAPI\Services\TransactionsService::list()
 *
 * @phpstan-type TransactionListParamsShape = array{
 *   limit?: string|null,
 *   marker?: string|null,
 *   startDate?: string|null,
 *   tipsSource?: string|null,
 *   type?: string|null,
 * }
 */
final class TransactionListParams implements BaseModel
{
    /** @use SdkModel<TransactionListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The number of transactions to return. Recommended: `10`.
     */
    #[Optional]
    public ?string $limit;

    /**
     * The marker used for pagination. Default: `null`.
     */
    #[Optional]
    public ?string $marker;

    /**
     * The start date for the transactions list. Defaults to 30 days ago.
     */
    #[Optional]
    public ?string $startDate;

    /**
     * Filter tips by source. Only applies when `type=tips`. Options: `profile`, `post_all`, `chat`, `stream`, `story`.
     */
    #[Optional]
    public ?string $tipsSource;

    /**
     * Filter by transaction type. Options: `subscribes`, `tips`, `post`, `chat_messages`, `stream`.
     */
    #[Optional]
    public ?string $type;

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
        ?string $marker = null,
        ?string $startDate = null,
        ?string $tipsSource = null,
        ?string $type = null,
    ): self {
        $self = new self;

        null !== $limit && $self['limit'] = $limit;
        null !== $marker && $self['marker'] = $marker;
        null !== $startDate && $self['startDate'] = $startDate;
        null !== $tipsSource && $self['tipsSource'] = $tipsSource;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * The number of transactions to return. Recommended: `10`.
     */
    public function withLimit(string $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * The marker used for pagination. Default: `null`.
     */
    public function withMarker(string $marker): self
    {
        $self = clone $this;
        $self['marker'] = $marker;

        return $self;
    }

    /**
     * The start date for the transactions list. Defaults to 30 days ago.
     */
    public function withStartDate(string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }

    /**
     * Filter tips by source. Only applies when `type=tips`. Options: `profile`, `post_all`, `chat`, `stream`, `story`.
     */
    public function withTipsSource(string $tipsSource): self
    {
        $self = clone $this;
        $self['tipsSource'] = $tipsSource;

        return $self;
    }

    /**
     * Filter by transaction type. Options: `subscribes`, `tips`, `post`, `chat_messages`, `stream`.
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
