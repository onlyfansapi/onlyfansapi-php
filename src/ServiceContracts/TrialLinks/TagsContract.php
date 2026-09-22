<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\TrialLinks;

use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\TrialLinks\Tags\TagAddResponse;
use OnlyFansAPI\TrialLinks\Tags\TagListResponse;
use OnlyFansAPI\TrialLinks\Tags\TagRemoveResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface TagsContract
{
    /**
     * @api
     *
     * @param int $trialLinkID The ID of the trial link
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        int $trialLinkID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): TagListResponse;

    /**
     * @api
     *
     * @param int $trialLinkID Path param: The ID of the trial link
     * @param string $account Path param: The Account ID
     * @param list<string> $tags body param: Array of tag names to add to the trial link
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function add(
        int $trialLinkID,
        string $account,
        array $tags,
        RequestOptions|array|null $requestOptions = null,
    ): TagAddResponse;

    /**
     * @api
     *
     * @param int $trialLinkID Path param: The ID of the trial link
     * @param string $account Path param: The Account ID
     * @param list<string> $tags body param: Array of tag names to remove from the trial link
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function remove(
        int $trialLinkID,
        string $account,
        array $tags,
        RequestOptions|array|null $requestOptions = null,
    ): TagRemoveResponse;
}
