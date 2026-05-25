<?php

declare(strict_types=1);

namespace OnlyFansAPI\Media\Vault\Lists;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Create a new Vault list.
 *
 * @see OnlyFansAPI\Services\Media\Vault\ListsService::create()
 *
 * @phpstan-type ListCreateParamsShape = array{name: string}
 */
final class ListCreateParams implements BaseModel
{
    /** @use SdkModel<ListCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The name of your new list.
     */
    #[Required]
    public string $name;

    /**
     * `new ListCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ListCreateParams::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ListCreateParams)->withName(...)
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
    public static function with(string $name): self
    {
        $self = new self;

        $self['name'] = $name;

        return $self;
    }

    /**
     * The name of your new list.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
