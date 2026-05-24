<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\TrialLinks;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\TrialLinks\Tags\TagAddParams;
use Onlyfansapi\TrialLinks\Tags\TagAddResponse;
use Onlyfansapi\TrialLinks\Tags\TagListParams;
use Onlyfansapi\TrialLinks\Tags\TagListResponse;
use Onlyfansapi\TrialLinks\Tags\TagRemoveParams;
use Onlyfansapi\TrialLinks\Tags\TagRemoveResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
