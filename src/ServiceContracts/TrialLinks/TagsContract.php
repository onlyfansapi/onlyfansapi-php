<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\TrialLinks;

use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\TrialLinks\Tags\TagAddResponse;
use Onlyfansapi\TrialLinks\Tags\TagListResponse;
use Onlyfansapi\TrialLinks\Tags\TagRemoveResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
