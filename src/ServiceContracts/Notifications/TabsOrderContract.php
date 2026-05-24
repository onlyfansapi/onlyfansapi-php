<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Notifications;

use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Notifications\TabsOrder\TabsOrderGetResponse;
use Onlyfansapi\Notifications\TabsOrder\TabsOrderUpdateResponse;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface TabsOrderContract
{
    /**
     * @api
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
    ): TabsOrderUpdateResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): TabsOrderGetResponse;
}
