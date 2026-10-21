<?php

declare(strict_types=1);

namespace OnlyFansAPI\TrialLinks;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Get list of subscribers who joined through a Free Trial Link.
 *
 * @see OnlyFansAPI\Services\TrialLinksService::listSubscribers()
 *
 * @phpstan-type TrialLinkListSubscribersParamsShape = array{
 *   account: string, limit: int, offset: int
 * }
 */
final class TrialLinkListSubscribersParams implements BaseModel
{
    /** @use SdkModel<TrialLinkListSubscribersParamsShape> */
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
     * `new TrialLinkListSubscribersParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TrialLinkListSubscribersParams::with(account: ..., limit: ..., offset: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TrialLinkListSubscribersParams)
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
