<?php

declare(strict_types=1);

namespace Onlyfansapi\Banking;

use Onlyfansapi\Banking\BankingListCountriesResponse\_Meta;
use Onlyfansapi\Banking\BankingListCountriesResponse\Data;
use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type _MetaShape from \Onlyfansapi\Banking\BankingListCountriesResponse\_Meta
 * @phpstan-import-type DataShape from \Onlyfansapi\Banking\BankingListCountriesResponse\Data
 *
 * @phpstan-type BankingListCountriesResponseShape = array{
 *   _meta?: null|_Meta|_MetaShape, data?: list<Data|DataShape>|null
 * }
 */
final class BankingListCountriesResponse implements BaseModel
{
    /** @use SdkModel<BankingListCountriesResponseShape> */
    use SdkModel;

    #[Optional]
    public ?_Meta $_meta;

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
     * @param _Meta|_MetaShape|null $_meta
     * @param list<Data|DataShape>|null $data
     */
    public static function with(
        _Meta|array|null $_meta = null,
        ?array $data = null
    ): self {
        $self = new self;

        null !== $_meta && $self['_meta'] = $_meta;
        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param _Meta|_MetaShape $_meta
     */
    public function withMeta(_Meta|array $_meta): self
    {
        $self = clone $this;
        $self['_meta'] = $_meta;

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
