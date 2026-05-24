<?php

declare(strict_types=1);

namespace Onlyfansapi\Media\Vault\Lists;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Show a Vault list.
 *
 * @see Onlyfansapi\Services\Media\Vault\ListsService::retrieve()
 *
 * @phpstan-type ListRetrieveParamsShape = array{account: string}
 */
final class ListRetrieveParams implements BaseModel
{
    /** @use SdkModel<ListRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * `new ListRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ListRetrieveParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ListRetrieveParams)->withAccount(...)
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
