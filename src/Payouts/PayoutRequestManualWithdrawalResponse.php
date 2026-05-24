<?php

declare(strict_types=1);

namespace Onlyfansapi\Payouts;

use Onlyfansapi\Core\Concerns\SdkUnion;
use Onlyfansapi\Core\Conversion\Contracts\Converter;
use Onlyfansapi\Core\Conversion\Contracts\ConverterSource;
use Onlyfansapi\Payouts\PayoutRequestManualWithdrawalResponse\UnionMember0;
use Onlyfansapi\Payouts\PayoutRequestManualWithdrawalResponse\UnionMember1;

/**
 * @phpstan-import-type UnionMember0Shape from \Onlyfansapi\Payouts\PayoutRequestManualWithdrawalResponse\UnionMember0
 * @phpstan-import-type UnionMember1Shape from \Onlyfansapi\Payouts\PayoutRequestManualWithdrawalResponse\UnionMember1
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
