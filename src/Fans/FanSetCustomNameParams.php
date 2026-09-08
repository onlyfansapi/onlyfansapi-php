<?php

declare(strict_types=1);

namespace OnlyFansAPI\Fans;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Change the Fan's Custom Name shown in OnlyFans.
 *
 * @see OnlyFansAPI\Services\FansService::setCustomName()
 *
 * @phpstan-type FanSetCustomNameParamsShape = array{
 *   account: string, customName: string
 * }
 */
final class FanSetCustomNameParams implements BaseModel
{
    /** @use SdkModel<FanSetCustomNameParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * New Custom Name for a Fan. Send empty string (`""`) or `null` to clear out the custom name.
     */
    #[Required('custom_name')]
    public string $customName;

    /**
     * `new FanSetCustomNameParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FanSetCustomNameParams::with(account: ..., customName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FanSetCustomNameParams)->withAccount(...)->withCustomName(...)
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
    public static function with(string $account, string $customName): self
    {
        $self = new self;

        $self['account'] = $account;
        $self['customName'] = $customName;

        return $self;
    }

    public function withAccount(string $account): self
    {
        $self = clone $this;
        $self['account'] = $account;

        return $self;
    }

    /**
     * New Custom Name for a Fan. Send empty string (`""`) or `null` to clear out the custom name.
     */
    public function withCustomName(string $customName): self
    {
        $self = clone $this;
        $self['customName'] = $customName;

        return $self;
    }
}
