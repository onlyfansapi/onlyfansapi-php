<?php

declare(strict_types=1);

namespace OnlyFansAPI\Payouts;

use OnlyFansAPI\Core\Concerns\SdkUnion;
use OnlyFansAPI\Core\Conversion\Contracts\Converter;
use OnlyFansAPI\Core\Conversion\Contracts\ConverterSource;
use OnlyFansAPI\Payouts\PayoutRequestManualWithdrawalResponse\UnionMember0;
use OnlyFansAPI\Payouts\PayoutRequestManualWithdrawalResponse\UnionMember1;

/**
 * @phpstan-import-type UnionMember0Shape from \OnlyFansAPI\Payouts\PayoutRequestManualWithdrawalResponse\UnionMember0
 * @phpstan-import-type UnionMember1Shape from \OnlyFansAPI\Payouts\PayoutRequestManualWithdrawalResponse\UnionMember1
 *
 * @phpstan-type PayoutRequestManualWithdrawalResponseVariants = UnionMember0|UnionMember1
 * @phpstan-type PayoutRequestManualWithdrawalResponseShape = PayoutRequestManualWithdrawalResponseVariants|UnionMember0Shape|UnionMember1Shape
 */
final class PayoutRequestManualWithdrawalResponse implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [UnionMember0::class, UnionMember1::class];
    }
}
