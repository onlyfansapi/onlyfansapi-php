<?php

declare(strict_types=1);

namespace Onlyfansapi\TrackingLinks;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Get list of subscribers who joined through a Tracking Link.
 *
 * @see Onlyfansapi\Services\TrackingLinksService::listSubscribers()
 *
 * @phpstan-type TrackingLinkListSubscribersParamsShape = array{
 *   account: string, limit: int, offset: int
 * }
 */
final class TrackingLinkListSubscribersParams implements BaseModel
{
    /** @use SdkModel<TrackingLinkListSubscribersParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * The number of subscribers to return per page. Default `10`.
     */
    #[Required]
    public int $limit;

    /**
     * The offset used for pagination. Default `0`.
     */
    #[Required]
    public int $offset;

    /**
     * `new TrackingLinkListSubscribersParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TrackingLinkListSubscribersParams::with(account: ..., limit: ..., offset: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TrackingLinkListSubscribersParams)
     *   ->withAccount(...)
     *   ->withLimit(...)
     *   ->withOffset(...)
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
    public static function with(string $account, int $limit, int $offset): self
    {
        $self = new self;

        $self['account'] = $account;
        $self['limit'] = $limit;
        $self['offset'] = $offset;

        return $self;
    }

    public function withAccount(string $account): self
    {
        $self = clone $this;
        $self['account'] = $account;

        return $self;
    }

    /**
     * The number of subscribers to return per page. Default `10`.
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
}
