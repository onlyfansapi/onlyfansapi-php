<?php

declare(strict_types=1);

namespace OnlyFansAPI\Promotions;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Delete a promotion for the account.
 *
 * @see OnlyFansAPI\Services\PromotionsService::delete()
 *
 * @phpstan-type PromotionDeleteParamsShape = array{account: string}
 */
final class PromotionDeleteParams implements BaseModel
{
    /** @use SdkModel<PromotionDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * `new PromotionDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PromotionDeleteParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PromotionDeleteParams)->withAccount(...)
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
    public static function with(string $account): self
    {
        $self = new self;

        $self['account'] = $account;

        return $self;
    }

    public function withAccount(string $account): self
    {
        $self = clone $this;
        $self['account'] = $account;

        return $self;
    }
}
