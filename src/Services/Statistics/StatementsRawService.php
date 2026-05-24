<?php

declare(strict_types=1);

namespace Onlyfansapi\Services\Statistics;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\Statistics\StatementsRawContract;
use Onlyfansapi\Statistics\Statements\StatementGetEarningsParams;
use Onlyfansapi\Statistics\Statements\StatementGetEarningsParams\Type;
use Onlyfansapi\Statistics\Statements\StatementGetEarningsResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class StatementsRawService implements StatementsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get the earnings for a given period.
     *
     * @param string $account The Account ID
     * @param array{
     *   startDate: string, endDate?: string, type?: Type|value-of<Type>
     * }|StatementGetEarningsParams $params
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
    ): BaseResponse {
        [$parsed, $options] = StatementGetEarningsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/statistics/statements/earnings', $account],
            query: Util::array_transform_keys(
                $parsed,
                ['startDate' => 'start_date', 'endDate' => 'end_date']
            ),
            options: $options,
            convert: StatementGetEarningsResponse::class,
        );
    }
}
