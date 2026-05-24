<?php

declare(strict_types=1);

namespace Onlyfansapi\Payouts\PayoutRequestManualWithdrawalResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Payouts\PayoutRequestManualWithdrawalResponse\UnionMember1\_Meta;
use Onlyfansapi\Payouts\PayoutRequestManualWithdrawalResponse\UnionMember1\Data;

/**
 * @phpstan-import-type _MetaShape from \Onlyfansapi\Payouts\PayoutRequestManualWithdrawalResponse\UnionMember1\_Meta
 * @phpstan-import-type DataShape from \Onlyfansapi\Payouts\PayoutRequestManualWithdrawalResponse\UnionMember1\Data
 *
 * @phpstan-type UnionMember1Shape = array{
 *   _meta?: null|_Meta|_MetaShape, data?: null|Data|DataShape
 * }
 */
final class UnionMember1 implements BaseModel
{
    /** @use SdkModel<UnionMember1Shape> */
    use SdkModel;

    #[Optional]
    public ?_Meta $_meta;

    #[Optional]
    public ?Data $data;

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
     * @param Data|DataShape|null $data
     */
    public static function with(
        _Meta|array|null $_meta = null,
        Data|array|null $data = null
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
     * @param Data|DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
