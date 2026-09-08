<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\Statistics;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\Statistics\StatementsRawContract;
use OnlyFansAPI\Statistics\Statements\StatementGetEarningsParams;
use OnlyFansAPI\Statistics\Statements\StatementGetEarningsParams\Type;
use OnlyFansAPI\Statistics\Statements\StatementGetEarningsResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
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
     *   endDate: string, startDate: string, type?: Type|value-of<Type>
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
                ['endDate' => 'end_date', 'startDate' => 'start_date']
            ),
            options: $options,
            convert: StatementGetEarningsResponse::class,
        );
    }
}
