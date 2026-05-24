<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Statistics;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\Statistics\Statements\StatementGetEarningsParams;
use Onlyfansapi\Statistics\Statements\StatementGetEarningsResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
