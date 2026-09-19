<?php

declare(strict_types=1);

namespace OnlyFansAPI\Media\Vault\Lists;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Delete a Vault list.
 *
 * @see OnlyFansAPI\Services\Media\Vault\ListsService::delete()
 *
 * @phpstan-type ListDeleteParamsShape = array{account: string}
 */
final class ListDeleteParams implements BaseModel
{
    /** @use SdkModel<ListDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * `new ListDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ListDeleteParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ListDeleteParams)->withAccount(...)
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
