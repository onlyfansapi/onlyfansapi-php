<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\Engagement\Messages;

use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Engagement\Messages\MassMessages\MassMessageChartResponse;
use OnlyFansAPI\Engagement\Messages\MassMessages\MassMessageListResponse;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface MassMessagesContract
{
    /**
     * @api
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
    ): MassMessageListResponse;

    /**
     * @api
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
    ): MassMessageChartResponse;
}
