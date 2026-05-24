<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\TrackingLinks;

use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\TrackingLinks\Tags\TagAddResponse;
use Onlyfansapi\TrackingLinks\Tags\TagListResponse;
use Onlyfansapi\TrackingLinks\Tags\TagRemoveResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface TagsContract
{
    /**
     * @api
     *
     * @param int $trackingLinkID The ID of the tracking link
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        int $trackingLinkID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): TagListResponse;

    /**
     * @api
     *
     * @param int $trackingLinkID Path param: The ID of the tracking link
     * @param string $account Path param: The Account ID
     * @param list<string> $tags body param: Array of tag names to add to the tracking link
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function add(
        int $trackingLinkID,
        string $account,
        array $tags,
        RequestOptions|array|null $requestOptions = null,
    ): TagAddResponse;

    /**
     * @api
     *
     * @param int $trackingLinkID Path param: The ID of the tracking link
     * @param string $account Path param: The Account ID
     * @param list<string> $tags body param: Array of tag names to remove from the tracking link
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function remove(
        int $trackingLinkID,
        string $account,
        array $tags,
        RequestOptions|array|null $requestOptions = null,
    ): TagRemoveResponse;
}
