<?php

declare(strict_types=1);

namespace Onlyfansapi\Users\Block;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Block user from accessing your profile.
 *
 * @see Onlyfansapi\Services\Users\BlockService::create()
 *
 * @phpstan-type BlockCreateParamsShape = array{account: string}
 */
final class BlockCreateParams implements BaseModel
{
    /** @use SdkModel<BlockCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * `new BlockCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BlockCreateParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BlockCreateParams)->withAccount(...)
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
