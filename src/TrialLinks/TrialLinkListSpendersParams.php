<?php

declare(strict_types=1);

namespace Onlyfansapi\TrialLinks;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Only available if we already scraped subscribers and calculated revenue per fan.
 *
 * @see Onlyfansapi\Services\TrialLinksService::listSpenders()
 *
 * @phpstan-type TrialLinkListSpendersParamsShape = array{
 *   account: string, limit?: int|null, minSpend?: float|null, offset?: int|null
 * }
 */
final class TrialLinkListSpendersParams implements BaseModel
{
    /** @use SdkModel<TrialLinkListSpendersParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * The number of spenders to return per page. Default `50`.
     */
    #[Optional]
    public ?int $limit;

    /**
     * Minimal spend of a fan. Default `1`. Must be at least 1.
     */
    #[Optional]
    public ?float $minSpend;

    /**
     * The offset used for pagination. Default `0`.
     */
    #[Optional]
    public ?int $offset;

    /**
     * `new TrialLinkListSpendersParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TrialLinkListSpendersParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TrialLinkListSpendersParams)->withAccount(...)
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
        ?float $minSpend = null,
        ?int $offset = null,
    ): self {
        $self = new self;

        $self['account'] = $account;

        null !== $limit && $self['limit'] = $limit;
        null !== $minSpend && $self['minSpend'] = $minSpend;
        null !== $offset && $self['offset'] = $offset;

        return $self;
    }

    public function withAccount(string $account): self
    {
        $self = clone $this;
        $self['account'] = $account;

        return $self;
    }

    /**
     * The number of spenders to return per page. Default `50`.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Minimal spend of a fan. Default `1`. Must be at least 1.
     */
    public function withMinSpend(float $minSpend): self
    {
        $self = clone $this;
        $self['minSpend'] = $minSpend;

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
