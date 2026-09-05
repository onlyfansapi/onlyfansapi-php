<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\Engagement;

use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Engagement\Messages\MessageGetMessageBuyersResponse;
use OnlyFansAPI\Engagement\Messages\MessageGetTopMessageResponse;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface MessagesContract
{
    /**
     * @api
     *
     * @param string $messageID path param: The ID of the message
     * @param string $account Path param: The Account ID
     * @param int $limit Query param: Number of buyers to return (default = 10)
     * @param int $marker Query param: Marker for pagination
     * @param int $offset Query param: Offset for pagination (default = 0)
     * @param string $skipUsers query param: Optional flag for subsequent pages (example: all)
     * @param int $skipUsersDups Query param: Skip duplicate users in results (0/1). Default = 1
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getMessageBuyers(
        string $messageID,
        string $account,
        ?int $limit = null,
        ?int $marker = null,
        ?int $offset = null,
        ?string $skipUsers = null,
        ?int $skipUsersDups = null,
        RequestOptions|array|null $requestOptions = null,
    ): MessageGetMessageBuyersResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param string $endDate The end date for the period. Keep empty to retrieve until now. It must be after `startDate`.
     * @param string $startDate The start date for the period. Keep empty to retrieve from the model start date.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getTopMessage(
        string $account,
        ?string $endDate = null,
        ?string $startDate = null,
        RequestOptions|array|null $requestOptions = null,
    ): MessageGetTopMessageResponse;
}
