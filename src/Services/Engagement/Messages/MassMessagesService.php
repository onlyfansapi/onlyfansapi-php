<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\Engagement\Messages;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\Engagement\Messages\MassMessages\MassMessageChartResponse;
use OnlyFansAPI\Engagement\Messages\MassMessages\MassMessageListResponse;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\Engagement\Messages\MassMessagesContract;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class MassMessagesService implements MassMessagesContract
{
    /**
     * @api
     */
    public MassMessagesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MassMessagesRawService($client);
    }

    /**
     * @api
     *
     * List sent mass messages with engagement stats (sent, viewed, purchased, etc.).
     *
     * @param string $account The Account ID
     * @param string $endDate The latest message to retrieve. Keep empty to get all. It must be after `startDate` and is also used for pagination.
     * @param int $limit Number of messages to return (default = 10)
     * @param string $query optionally, filter by message text
     * @param string $startDate The earliest message to retrieve. Keep empty to get all.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $account,
        ?string $endDate = null,
        ?int $limit = null,
        ?string $query = null,
        ?string $startDate = null,
        RequestOptions|array|null $requestOptions = null,
    ): MassMessageListResponse {
        $params = Util::removeNulls(
            [
                'endDate' => $endDate,
                'limit' => $limit,
                'query' => $query,
                'startDate' => $startDate,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get engagement chart metrics for mass messages: sent count and purchase amount over time.
     *
     * @param string $account The Account ID
     * @param string $endDate End of the chart window in `Y-m-d H:i:s` format. It must be after `startDate`.
     * @param string $startDate start of the chart window in `Y-m-d H:i:s` format
     * @param bool $withTotal Include `total` and `delta` aggregates in the response. Defaults to `true`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function chart(
        string $account,
        ?string $endDate = null,
        ?string $startDate = null,
        ?bool $withTotal = null,
        RequestOptions|array|null $requestOptions = null,
    ): MassMessageChartResponse {
        $params = Util::removeNulls(
            [
                'endDate' => $endDate,
                'startDate' => $startDate,
                'withTotal' => $withTotal,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->chart($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
