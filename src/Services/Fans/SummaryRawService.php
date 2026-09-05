<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\Fans;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Fans\Summary\SummaryGenerateSummaryParams;
use OnlyFansAPI\Fans\Summary\SummaryGenerateSummaryResponse;
use OnlyFansAPI\Fans\Summary\SummaryGetSummaryParams;
use OnlyFansAPI\Fans\Summary\SummaryGetSummaryResponse;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\Fans\SummaryRawContract;

/**
 * APIs for generating and retrieving AI-powered fan profile summaries.
 *
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class SummaryRawService implements SummaryRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Queue generation or regeneration of an AI profile summary for a fan. Costs 200 credits (charged on completion). Use the GET endpoint to poll for results. To regenerate an existing summary, pass `regenerate: true`.
     *
     * @param string $fanID Path param: Fan's OnlyFans ID
     * @param array{
     *   account: string, regenerate?: bool
     * }|SummaryGenerateSummaryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SummaryGenerateSummaryResponse>
     *
     * @throws APIException
     */
    public function generateSummary(
        string $fanID,
        array|SummaryGenerateSummaryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SummaryGenerateSummaryParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/fans/%2$s/summary', $account, $fanID],
            body: (object) array_diff_key($parsed, array_flip(['account'])),
            options: $options,
            convert: SummaryGenerateSummaryResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the AI profile summary for a fan. Poll this endpoint after triggering a generation to check for completion.
     *
     * @param string $fanID Fan's OnlyFans ID
     * @param array{account: string}|SummaryGetSummaryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SummaryGetSummaryResponse>
     *
     * @throws APIException
     */
    public function getSummary(
        string $fanID,
        array|SummaryGetSummaryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SummaryGetSummaryParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/fans/%2$s/summary', $account, $fanID],
            options: $options,
            convert: SummaryGetSummaryResponse::class,
        );
    }
}
