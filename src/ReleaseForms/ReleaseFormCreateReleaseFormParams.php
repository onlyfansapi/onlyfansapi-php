<?php

declare(strict_types=1);

namespace Onlyfansapi\ReleaseForms;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Create a new release form link.
 *
 * @see Onlyfansapi\Services\ReleaseFormsService::createReleaseForm()
 *
 * @phpstan-type ReleaseFormCreateReleaseFormParamsShape = array{name: string}
 */
final class ReleaseFormCreateReleaseFormParams implements BaseModel
{
    /** @use SdkModel<ReleaseFormCreateReleaseFormParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The name of the release form.
     */
    #[Required]
    public string $name;

    /**
     * `new ReleaseFormCreateReleaseFormParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ReleaseFormCreateReleaseFormParams::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ReleaseFormCreateReleaseFormParams)->withName(...)
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
     * The name of the release form.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
