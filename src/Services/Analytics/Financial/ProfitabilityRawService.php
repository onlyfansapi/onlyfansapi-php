<?php

declare(strict_types=1);

namespace Onlyfansapi\Services\Analytics\Financial;

use Onlyfansapi\Analytics\Financial\Profitability\ProfitabilityGetHistoryParams;
use Onlyfansapi\Analytics\Financial\Profitability\ProfitabilityGetHistoryResponseItem;
use Onlyfansapi\Analytics\Financial\Profitability\ProfitabilityGetProfitabilityParams;
use Onlyfansapi\Analytics\Financial\Profitability\ProfitabilityGetProfitabilityResponseItem;
use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Conversion\ListOf;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\Analytics\Financial\ProfitabilityRawContract;

/**
 * APIs for retrieving financial analytics data.
 *
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
     * @param array{months?: int}|ProfitabilityGetHistoryParams $params
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
            query: $parsed,
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
