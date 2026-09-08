<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\TrialLinks;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\TrialLinks\Tags\TagAddParams;
use OnlyFansAPI\TrialLinks\Tags\TagAddResponse;
use OnlyFansAPI\TrialLinks\Tags\TagListParams;
use OnlyFansAPI\TrialLinks\Tags\TagListResponse;
use OnlyFansAPI\TrialLinks\Tags\TagRemoveParams;
use OnlyFansAPI\TrialLinks\Tags\TagRemoveResponse;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface TagsRawContract
{
    /**
     * @api
     *
     * @param int $trialLinkID The ID of the trial link
     * @param array<string,mixed>|TagListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TagListResponse>
     *
     * @throws APIException
     */
    public function list(
        int $trialLinkID,
        array|TagListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $trialLinkID Path param: The ID of the trial link
     * @param array<string,mixed>|TagAddParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TagAddResponse>
     *
     * @throws APIException
     */
    public function add(
        int $trialLinkID,
        array|TagAddParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $trialLinkID Path param: The ID of the trial link
     * @param array<string,mixed>|TagRemoveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TagRemoveResponse>
     *
     * @throws APIException
     */
    public function remove(
        int $trialLinkID,
        array|TagRemoveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
