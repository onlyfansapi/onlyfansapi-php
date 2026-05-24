<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Media;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Media\Uploads\UploadGetStatusParams;
use Onlyfansapi\Media\Uploads\UploadGetStatusResponse\UnionMember0;
use Onlyfansapi\Media\Uploads\UploadGetStatusResponse\UnionMember1;
use Onlyfansapi\Media\Uploads\UploadGetStatusResponse\UnionMember2;
use Onlyfansapi\Media\Uploads\UploadGetStatusResponse\UnionMember3;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface UploadsRawContract
{
    /**
     * @api
     *
     * @param string $upload the prefixed ID of the upload
     * @param array<string,mixed>|UploadGetStatusParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UnionMember0|UnionMember1|UnionMember2|UnionMember3>
     *
     * @throws APIException
     */
    public function getStatus(
        string $upload,
        array|UploadGetStatusParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
