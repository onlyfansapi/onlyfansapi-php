<?php

declare(strict_types=1);

namespace Onlyfansapi\Services\Notifications;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\Notifications\TabsOrder\TabsOrderGetResponse;
use Onlyfansapi\Notifications\TabsOrder\TabsOrderUpdateResponse;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\Notifications\TabsOrderContract;

/**
 * Endpoints for managingr account notifications.
 *
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class TabsOrderService implements TabsOrderContract
{
    /**
     * @api
     */
    public TabsOrderRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TabsOrderRawService($client);
    }

    /**
     * @api
     *
     * Update the order of an account's notification tabs as displayed on the OnlyFans notifications page
     *
     * @param string $account The Account ID
     * @param list<string> $tabs Array of tab keys. Must include exactly these: all, subscriptions, onlyfans, purchases, tips, tags, comments, mentions, likes, promotions.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $account,
        array $tabs,
        RequestOptions|array|null $requestOptions = null,
    ): TabsOrderUpdateResponse {
        $params = Util::removeNulls(['tabs' => $tabs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the order of an account's notification tabs as displayed on the OnlyFans notifications page
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): TabsOrderGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($account, requestOptions: $requestOptions);

        return $response->parse();
    }
}
