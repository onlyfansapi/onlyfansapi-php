<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Engagement\Messages;

use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Engagement\Messages\DirectMessages\DirectMessageChartResponse;
use Onlyfansapi\Engagement\Messages\DirectMessages\DirectMessageListResponse;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface DirectMessagesContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param string $endDate The latest message to retrieve. Keep empty to get all. MUST BE DATE AFTER `startDate`. This is also used for pagination.
     * @param int $limit Number of messages to return (default = 10)
     * @param int $offset optional offset for manual pagination
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
        ?int $offset = null,
        ?string $query = null,
        ?string $startDate = null,
        RequestOptions|array|null $requestOptions = null,
    ): DirectMessageListResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param string $endDate End of the chart window in `Y-m-d H:i:s` format. Must be after `startDate`.
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
    ): DirectMessageChartResponse;
}
