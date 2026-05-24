<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\SharedTrackingLinks;

use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\SharedTrackingLinks\Tags\TagAddResponse;
use Onlyfansapi\SharedTrackingLinks\Tags\TagListResponse;
use Onlyfansapi\SharedTrackingLinks\Tags\TagRemoveResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface TagsContract
{
    /**
     * @api
     *
     * @param int $sharedTrackingLinkID The OnlyFans-side ID of the shared tracking link
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        int $sharedTrackingLinkID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): TagListResponse;

    /**
     * @api
     *
     * @param int $sharedTrackingLinkID Path param: The OnlyFans-side ID of the shared tracking link
     * @param string $account Path param: The Account ID
     * @param list<string> $tags body param: Array of tag names to add to the shared tracking link
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function add(
        int $sharedTrackingLinkID,
        string $account,
        array $tags,
        RequestOptions|array|null $requestOptions = null,
    ): TagAddResponse;

    /**
     * @api
     *
     * @param int $sharedTrackingLinkID Path param: The OnlyFans-side ID of the shared tracking link
     * @param string $account Path param: The Account ID
     * @param list<string> $tags body param: Array of tag names to remove from the shared tracking link
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function remove(
        int $sharedTrackingLinkID,
        string $account,
        array $tags,
        RequestOptions|array|null $requestOptions = null,
    ): TagRemoveResponse;
}
