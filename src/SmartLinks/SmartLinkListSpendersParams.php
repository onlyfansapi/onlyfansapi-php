<?php

declare(strict_types=1);

namespace OnlyFansAPI\SmartLinks;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Compatibility endpoint returning fans with attributed spend through a Smart Link.
 *
 * @see OnlyFansAPI\Services\SmartLinksService::listSpenders()
 *
 * @phpstan-type SmartLinkListSpendersParamsShape = array{
 *   limit?: int|null, minSpend?: float|null, offset?: int|null
 * }
 */
final class SmartLinkListSpendersParams implements BaseModel
{
    /** @use SdkModel<SmartLinkListSpendersParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The number of spenders to return per page. Default `50`.
     */
    #[Optional]
    public ?int $limit;

    /**
     * Minimal spend of a fan. Default `1`.
     */
    #[Optional]
    public ?float $minSpend;

    /**
     * The offset used for pagination. Default `0`.
     */
    #[Optional]
    public ?int $offset;

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
        ?float $minSpend = null,
        ?int $offset = null
    ): self {
        $self = new self;

        null !== $limit && $self['limit'] = $limit;
        null !== $minSpend && $self['minSpend'] = $minSpend;
        null !== $offset && $self['offset'] = $offset;

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
     * Minimal spend of a fan. Default `1`.
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
