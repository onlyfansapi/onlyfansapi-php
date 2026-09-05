<?php

declare(strict_types=1);

namespace OnlyFansAPI\Media\Vault\Lists;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Rename a Vault list.
 *
 * @see OnlyFansAPI\Services\Media\Vault\ListsService::update()
 *
 * @phpstan-type ListUpdateParamsShape = array{account: string, name: string}
 */
final class ListUpdateParams implements BaseModel
{
    /** @use SdkModel<ListUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * The new name for the vault list. Must not be greater than 255 characters.
     */
    #[Required]
    public string $name;

    /**
     * `new ListUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ListUpdateParams::with(account: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ListUpdateParams)->withAccount(...)->withName(...)
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
    public static function with(string $account, string $name): self
    {
        $self = new self;

        $self['account'] = $account;
        $self['name'] = $name;

        return $self;
    }

    public function withAccount(string $account): self
    {
        $self = clone $this;
        $self['account'] = $account;

        return $self;
    }

    /**
     * The new name for the vault list. Must not be greater than 255 characters.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
