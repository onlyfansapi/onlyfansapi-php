<?php

declare(strict_types=1);

namespace Onlyfansapi\Posts\Labels;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Create a new post label.
 *
 * @see Onlyfansapi\Services\Posts\LabelsService::create()
 *
 * @phpstan-type LabelCreateParamsShape = array{name: string}
 */
final class LabelCreateParams implements BaseModel
{
    /** @use SdkModel<LabelCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The name of your new label.
     */
    #[Required]
    public string $name;

    /**
     * `new LabelCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LabelCreateParams::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LabelCreateParams)->withName(...)
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
     * The name of your new label.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
