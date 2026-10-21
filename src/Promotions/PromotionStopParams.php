<?php

declare(strict_types=1);

namespace OnlyFansAPI\Promotions;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Stop an active promotion for the account.
 *
 * @see OnlyFansAPI\Services\PromotionsService::stop()
 *
 * @phpstan-type PromotionStopParamsShape = array{account: string}
 */
final class PromotionStopParams implements BaseModel
{
    /** @use SdkModel<PromotionStopParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * `new PromotionStopParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PromotionStopParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PromotionStopParams)->withAccount(...)
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
