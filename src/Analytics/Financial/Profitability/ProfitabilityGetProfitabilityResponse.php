<?php

declare(strict_types=1);

namespace OnlyFansAPI\Analytics\Financial\Profitability;

use OnlyFansAPI\Analytics\Financial\Profitability\ProfitabilityGetProfitabilityResponse\Data;
use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type DataShape from \OnlyFansAPI\Analytics\Financial\Profitability\ProfitabilityGetProfitabilityResponse\Data
 *
 * @phpstan-type ProfitabilityGetProfitabilityResponseShape = array{
 *   data?: list<Data|DataShape>|null
 * }
 */
final class ProfitabilityGetProfitabilityResponse implements BaseModel
{
    /** @use SdkModel<ProfitabilityGetProfitabilityResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Optional(list: Data::class)]
    public ?array $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Data|DataShape>|null $data
     */
    public static function with(?array $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<Data|DataShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
