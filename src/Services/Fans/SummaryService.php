<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\Fans;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\Fans\Summary\SummaryGenerateSummaryResponse;
use OnlyFansAPI\Fans\Summary\SummaryGetSummaryResponse;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\Fans\SummaryContract;

/**
 * APIs for generating and retrieving AI-powered fan profile summaries.
 *
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class SummaryService implements SummaryContract
{
    /**
     * @api
     */
    public SummaryRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SummaryRawService($client);
    }

    /**
     * @api
     *
     * Queue generation or regeneration of an AI profile summary for a fan. Costs 200 credits (charged on completion). Use the GET endpoint to poll for results. To regenerate an existing summary, pass `regenerate: true`.
     *
     * @param string $fanID Path param: Fan's OnlyFans ID
     * @param string $account Path param: The Account ID
     * @param bool $regenerate body param: Set to true to regenerate an existing completed summary
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function generateSummary(
        string $fanID,
        string $account,
        ?bool $regenerate = null,
        RequestOptions|array|null $requestOptions = null,
    ): SummaryGenerateSummaryResponse {
        $params = Util::removeNulls(
            ['account' => $account, 'regenerate' => $regenerate]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->generateSummary($fanID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the AI profile summary for a fan. Poll this endpoint after triggering a generation to check for completion.
     *
     * @param string $fanID Fan's OnlyFans ID
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getSummary(
        string $fanID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): SummaryGetSummaryResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getSummary($fanID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
