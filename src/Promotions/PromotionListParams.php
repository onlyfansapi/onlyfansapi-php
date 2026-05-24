<?php

declare(strict_types=1);

namespace Onlyfansapi\Promotions;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * List all promotions for the account.
 *
 * @see Onlyfansapi\Services\PromotionsService::list()
 *
 * @phpstan-type PromotionListParamsShape = array{
 *   limit?: int|null, offset?: int|null
 * }
 */
final class PromotionListParams implements BaseModel
{
    /** @use SdkModel<PromotionListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The number of promotions to return. Default `10`.
     */
    #[Optional]
    public ?int $limit;

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
    public static function with(?int $limit = null, ?int $offset = null): self
    {
        $self = new self;

        null !== $limit && $self['limit'] = $limit;
        null !== $offset && $self['offset'] = $offset;

        return $self;
    }

    /**
     * The number of promotions to return. Default `10`.
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
