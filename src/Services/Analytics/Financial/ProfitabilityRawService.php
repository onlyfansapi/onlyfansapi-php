<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\Analytics\Financial;

use OnlyFansAPI\Analytics\Financial\Profitability\ProfitabilityGetHistoryParams;
use OnlyFansAPI\Analytics\Financial\Profitability\ProfitabilityGetHistoryResponseItem;
use OnlyFansAPI\Analytics\Financial\Profitability\ProfitabilityGetProfitabilityParams;
use OnlyFansAPI\Analytics\Financial\Profitability\ProfitabilityGetProfitabilityResponseItem;
use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Conversion\ListOf;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\Analytics\Financial\ProfitabilityRawContract;

/**
 * APIs for retrieving financial analytics data.
 *
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class ProfitabilityRawService implements ProfitabilityRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get historical profitability data for a specific account over multiple months.
     *
     * @param string $account The Account ID
     * @param array{
     *   accountPrefixedID: string, months?: int
     * }|ProfitabilityGetHistoryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<ProfitabilityGetHistoryResponseItem>>
     *
     * @throws APIException
     */
    public function getHistory(
        string $account,
        array|ProfitabilityGetHistoryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ProfitabilityGetHistoryParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/analytics/financial/profitability/%1$s/history', $account],
            query: Util::array_transform_keys(
                $parsed,
                ['accountPrefixedID' => 'account_prefixed_id']
            ),
            options: $options,
            convert: new ListOf(ProfitabilityGetHistoryResponseItem::class),
        );
    }

    /**
     * @api
     *
     * Calculate profitability for creators including revenue, costs, commissions, and margins for a specific month.
     *
     * @param array{
     *   accountIDs: list<string>, month: int, year: int
     * }|ProfitabilityGetProfitabilityParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<ProfitabilityGetProfitabilityResponseItem>>
     *
     * @throws APIException
     */
    public function getProfitability(
        array|ProfitabilityGetProfitabilityParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ProfitabilityGetProfitabilityParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'api/analytics/financial/profitability',
            body: (object) $parsed,
            options: $options,
            convert: new ListOf(ProfitabilityGetProfitabilityResponseItem::class),
        );
    }
}
