<?php

declare(strict_types=1);

namespace Onlyfansapi\SharedTrackingLinks;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * List all Tracking Links (campaigns) shared with the account by other OF creators. Calls OnlyFans live and syncs to our cache.
 *
 * @see Onlyfansapi\Services\SharedTrackingLinksService::list()
 *
 * @phpstan-type SharedTrackingLinkListParamsShape = array{
 *   limit?: int|null, offset?: int|null, synchronous?: bool|null
 * }
 */
final class SharedTrackingLinkListParams implements BaseModel
{
    /** @use SdkModel<SharedTrackingLinkListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The number of shared tracking links to return. Default `10`.
     */
    #[Optional]
    public ?int $limit;

    /**
     * The offset used for pagination. Default `0`.
     */
    #[Optional]
    public ?int $offset;

    /**
     * Wait for the database sync to finish, instead of running it in the background. **Will result in longer response times, use with caution**. Default `false`.
     */
    #[Optional(nullable: true)]
    public ?bool $synchronous;

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
        ?int $limit = null,
        ?int $offset = null,
        ?bool $synchronous = null
    ): self {
        $self = new self;

        null !== $limit && $self['limit'] = $limit;
        null !== $offset && $self['offset'] = $offset;
        null !== $synchronous && $self['synchronous'] = $synchronous;

        return $self;
    }

    /**
     * The number of shared tracking links to return. Default `10`.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * The offset used for pagination. Default `0`.
     */
    public function withOffset(int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }

    /**
     * Wait for the database sync to finish, instead of running it in the background. **Will result in longer response times, use with caution**. Default `false`.
     */
    public function withSynchronous(?bool $synchronous): self
    {
        $self = clone $this;
        $self['synchronous'] = $synchronous;

        return $self;
    }
}
