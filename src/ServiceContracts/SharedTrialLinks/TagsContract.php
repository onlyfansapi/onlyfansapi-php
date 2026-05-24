<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\SharedTrialLinks;

use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\SharedTrialLinks\Tags\TagAddResponse;
use Onlyfansapi\SharedTrialLinks\Tags\TagListResponse;
use Onlyfansapi\SharedTrialLinks\Tags\TagRemoveResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface TagsContract
{
    /**
     * @api
     *
     * @param int $sharedTrialLinkID The OnlyFans-side ID of the shared trial link
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        int $sharedTrialLinkID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): TagListResponse;

    /**
     * @api
     *
     * @param int $sharedTrialLinkID Path param: The OnlyFans-side ID of the shared trial link
     * @param string $account Path param: The Account ID
     * @param list<string> $tags body param: Array of tag names to add to the shared trial link
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function add(
        int $sharedTrialLinkID,
        string $account,
        array $tags,
        RequestOptions|array|null $requestOptions = null,
    ): TagAddResponse;

    /**
     * @api
     *
     * @param int $sharedTrialLinkID Path param: The OnlyFans-side ID of the shared trial link
     * @param string $account Path param: The Account ID
     * @param list<string> $tags body param: Array of tag names to remove from the shared trial link
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function remove(
        int $sharedTrialLinkID,
        string $account,
        array $tags,
        RequestOptions|array|null $requestOptions = null,
    ): TagRemoveResponse;
}
