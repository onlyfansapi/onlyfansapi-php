<?php

declare(strict_types=1);

namespace Onlyfansapi\Bundles;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Delete a bundle for the account.
 *
 * @see Onlyfansapi\Services\BundlesService::delete()
 *
 * @phpstan-type BundleDeleteParamsShape = array{account: string}
 */
final class BundleDeleteParams implements BaseModel
{
    /** @use SdkModel<BundleDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * `new BundleDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BundleDeleteParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BundleDeleteParams)->withAccount(...)
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
