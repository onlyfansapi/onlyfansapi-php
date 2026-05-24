<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Statistics;

use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\Statistics\Statements\StatementGetEarningsParams\Type;
use Onlyfansapi\Statistics\Statements\StatementGetEarningsResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface StatementsContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param string $startDate The start date for the period
     * @param string $endDate the end date for the period
     * @param Type|value-of<Type> $type Filter by All / Subscriptions / Tips / Posts / Messages / Streams
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getEarnings(
        string $account,
        string $startDate,
        ?string $endDate = null,
        Type|string|null $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): StatementGetEarningsResponse;
}
