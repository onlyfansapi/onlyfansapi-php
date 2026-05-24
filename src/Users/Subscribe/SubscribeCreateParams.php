<?php

declare(strict_types=1);

namespace Onlyfansapi\Users\Subscribe;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Subscribe to a user's profile.
 *
 * @see Onlyfansapi\Services\Users\SubscribeService::create()
 *
 * @phpstan-type SubscribeCreateParamsShape = array{account: string}
 */
final class SubscribeCreateParams implements BaseModel
{
    /** @use SdkModel<SubscribeCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * `new SubscribeCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubscribeCreateParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubscribeCreateParams)->withAccount(...)
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
