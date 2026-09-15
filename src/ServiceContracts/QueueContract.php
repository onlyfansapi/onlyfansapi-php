<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Queue\QueueCountResponse;
use OnlyFansAPI\Queue\QueueListParams\Type;
use OnlyFansAPI\Queue\QueueListResponse;
use OnlyFansAPI\Queue\QueuePublishResponse;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface QueueContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param string $publishDateEnd Latest publish date to return. Must be a valid date. Must be a valid date. Must be a date after or equal to <code>publishDateStart</code>.
     * @param string $publishDateStart Earliest publish date to return (must be at least today). Must be a valid date. Must be a valid date. Must be a date after or equal to <code>today</code>.
     * @param string $timezone Timezone of the provided dates. [View available timezone values](https://www.php.net/manual/en/timezones.php). Must be a valid time zone, such as <code>Africa/Accra</code>.
     * @param int $limit Maximum number of queue items to return (default 20). Must be at least 1. Must not be greater than 100.
     * @param list<Type|value-of<Type>> $type
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $account,
        string $publishDateEnd,
        string $publishDateStart,
        string $timezone,
        ?int $limit = null,
        ?array $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): QueueListResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param string $publishDateEnd Latest publish date to count to
     * @param string $publishDateStart Earliest publish date to count from (must be at least today)
     * @param string $timezone Time timezone of the provided dates. [View available timezone values](https://www.php.net/manual/en/timezones.php)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function count(
        string $account,
        string $publishDateEnd,
        string $publishDateStart,
        string $timezone,
        RequestOptions|array|null $requestOptions = null,
    ): QueueCountResponse;

    /**
     * @api
     *
     * @param string $queueID The ID of the message queue item. Can be retrieved from Queue or Mass Messaging endpoints
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function publish(
        string $queueID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): QueuePublishResponse;
}
