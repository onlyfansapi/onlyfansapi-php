<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\Queue\QueueCountResponse;
use Onlyfansapi\Queue\QueueListResponse;
use Onlyfansapi\Queue\QueuePublishResponse;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\QueueContract;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class QueueService implements QueueContract
{
    /**
     * @api
     */
    public QueueRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new QueueRawService($client);
    }

    /**
     * @api
     *
     * List posts and messages in the queue.
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
    ): QueueListResponse {
        $params = Util::removeNulls(
            [
                'limit' => $limit,
                'publishDateEnd' => $publishDateEnd,
                'publishDateStart' => $publishDateStart,
                'timezone' => $timezone,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Count posts and messages in the queue.
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
    ): QueueCountResponse {
        $params = Util::removeNulls(
            [
                'publishDateEnd' => $publishDateEnd,
                'publishDateStart' => $publishDateStart,
                'timezone' => $timezone,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->count($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Publish a queue item or "saved for later" item (post or mass message). This means that the item will be sent immediately, regardless of its scheduled date.
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
    ): QueuePublishResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->publish($queueID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
