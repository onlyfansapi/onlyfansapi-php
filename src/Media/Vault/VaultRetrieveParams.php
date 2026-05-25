<?php

declare(strict_types=1);

namespace OnlyFansAPI\Media\Vault;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Retrieve details about a specific media item in your vault.
 *
 * @see OnlyFansAPI\Services\Media\VaultService::retrieve()
 *
 * @phpstan-type VaultRetrieveParamsShape = array{account: string}
 */
final class VaultRetrieveParams implements BaseModel
{
    /** @use SdkModel<VaultRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * `new VaultRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VaultRetrieveParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VaultRetrieveParams)->withAccount(...)
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
