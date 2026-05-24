<?php

declare(strict_types=1);

namespace Onlyfansapi\Posts\PostDeleteResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Posts\PostDeleteResponse\Data\Counters;

/**
 * @phpstan-import-type CountersShape from \Onlyfansapi\Posts\PostDeleteResponse\Data\Counters
 *
 * @phpstan-type DataShape = array{
 *   counters?: null|Counters|CountersShape, success?: bool|null
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?Counters $counters;

    #[Optional]
    public ?bool $success;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Counters|CountersShape|null $counters
     */
    public static function with(
        Counters|array|null $counters = null,
        ?bool $success = null
    ): self {
        $self = new self;

        null !== $counters && $self['counters'] = $counters;
        null !== $success && $self['success'] = $success;

        return $self;
    }

    /**
     * @param Counters|CountersShape $counters
     */
    public function withCounters(Counters|array $counters): self
    {
        $self = clone $this;
        $self['counters'] = $counters;

        return $self;
    }

    public function withSuccess(bool $success): self
    {
        $self = clone $this;
        $self['success'] = $success;

        return $self;
    }
}
