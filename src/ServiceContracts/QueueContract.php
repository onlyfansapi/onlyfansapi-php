<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Queue\QueueCountResponse;
use Onlyfansapi\Queue\QueueListResponse;
use Onlyfansapi\Queue\QueuePublishResponse;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface QueueContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param int $limit Maximum number of queue items to return (default = 20)
     * @param string $publishDateEnd Latest publish date to return
     * @param string $publishDateStart Earliest publish date to return (must be at least today)
     * @param string $timezone Time timezone of the provided dates. [View available timezone values](https://www.php.net/manual/en/timezones.php)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $account,
        int $limit,
        string $publishDateEnd,
        string $publishDateStart,
        string $timezone,
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
