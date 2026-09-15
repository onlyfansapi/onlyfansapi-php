<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\Statistics;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\Statistics\Statements\StatementGetEarningsParams;
use OnlyFansAPI\Statistics\Statements\StatementGetEarningsResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface StatementsRawContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|StatementGetEarningsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<StatementGetEarningsResponse>
     *
     * @throws APIException
     */
    public function getEarnings(
        string $account,
        array|StatementGetEarningsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
