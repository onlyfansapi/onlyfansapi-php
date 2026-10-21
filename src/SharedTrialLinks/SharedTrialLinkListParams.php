<?php

declare(strict_types=1);

namespace OnlyFansAPI\SharedTrialLinks;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\SharedTrialLinks\SharedTrialLinkListParams\Pagination;

/**
 * List all Free Trial Links shared with the account by other OF creators. Calls OnlyFans live and syncs to our cache.
 *
 * @see OnlyFansAPI\Services\SharedTrialLinksService::list()
 *
 * @phpstan-type SharedTrialLinkListParamsShape = array{
 *   limit?: int|null,
 *   offset?: int|null,
 *   pagination?: null|Pagination|value-of<Pagination>,
 *   synchronous?: bool|null,
 * }
 */
final class SharedTrialLinkListParams implements BaseModel
{
    /** @use SdkModel<SharedTrialLinkListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The number of shared trial links to return. Default `10`. Must be at least 1. Must not be greater than 100.
     */
    #[Optional]
    public ?int $limit;

    /**
     * The offset used for pagination. Default `0`. Must be at least 0.
     */
    #[Optional]
    public ?int $offset;

    /** @var value-of<Pagination>|null $pagination */
    #[Optional(enum: Pagination::class)]
    public ?int $pagination;

    /**
     * Wait for the database sync instead of processing it in the background.
     */
    #[Optional]
    public ?bool $synchronous;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Pagination|value-of<Pagination>|null $pagination
     */
    public static function with(
        ?int $limit = null,
        ?int $offset = null,
        Pagination|int|null $pagination = null,
        ?bool $synchronous = null,
    ): self {
        $self = new self;

        null !== $limit && $self['limit'] = $limit;
        null !== $offset && $self['offset'] = $offset;
        null !== $pagination && $self['pagination'] = $pagination;
        null !== $synchronous && $self['synchronous'] = $synchronous;

        return $self;
    }

    /**
     * The number of shared trial links to return. Default `10`. Must be at least 1. Must not be greater than 100.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * The offset used for pagination. Default `0`. Must be at least 0.
     */
    public function withOffset(int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }

    /**
     * @param Pagination|value-of<Pagination> $pagination
     */
    public function withPagination(Pagination|int $pagination): self
    {
        $self = clone $this;
        $self['pagination'] = $pagination;

        return $self;
    }

    /**
     * Wait for the database sync instead of processing it in the background.
     */
    public function withSynchronous(bool $synchronous): self
    {
        $self = clone $this;
        $self['synchronous'] = $synchronous;

        return $self;
    }
}
