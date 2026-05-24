<?php

declare(strict_types=1);

namespace Onlyfansapi\Users\Block;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Unblock a previously blocked user.
 *
 * @see Onlyfansapi\Services\Users\BlockService::delete()
 *
 * @phpstan-type BlockDeleteParamsShape = array{account: string}
 */
final class BlockDeleteParams implements BaseModel
{
    /** @use SdkModel<BlockDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * `new BlockDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BlockDeleteParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BlockDeleteParams)->withAccount(...)
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
