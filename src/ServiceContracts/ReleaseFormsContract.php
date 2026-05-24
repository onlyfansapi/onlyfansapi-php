<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\ReleaseForms\ReleaseFormListTaggableUsersParams\Filter;
use Onlyfansapi\ReleaseForms\ReleaseFormListTaggableUsersParams\Sort;
use Onlyfansapi\ReleaseForms\ReleaseFormListTaggableUsersParams\SortDirection;
use Onlyfansapi\ReleaseForms\ReleaseFormListTaggableUsersResponse;
use Onlyfansapi\ReleaseForms\ReleaseFormNewInvitationLinkResponse;
use Onlyfansapi\ReleaseForms\ReleaseFormNewReleaseFormResponse;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface ReleaseFormsContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param string $name the name of the invitation link
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createInvitationLink(
        string $account,
        string $name,
        RequestOptions|array|null $requestOptions = null,
    ): ReleaseFormNewInvitationLinkResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param string $name the name of the release form
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createReleaseForm(
        string $account,
        string $name,
        RequestOptions|array|null $requestOptions = null,
    ): ReleaseFormNewReleaseFormResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param Filter|value-of<Filter>|null $filter filter users by type: `all` or `pending`
     * @param int $limit Number of users to return per page (1-50). Must be at least 1. Must not be greater than 50.
     * @param string|null $name filter users by name or username
     * @param int $offset Number of users to skip for pagination. Must be at least 0.
     * @param Sort|value-of<Sort>|null $sort sort field: `date` or `name`
     * @param SortDirection|value-of<SortDirection>|null $sortDirection sort direction: `desc` or `asc`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listTaggableUsers(
        string $account,
        Filter|string|null $filter = null,
        ?int $limit = null,
        ?string $name = null,
        ?int $offset = null,
        Sort|string|null $sort = null,
        SortDirection|string|null $sortDirection = null,
        RequestOptions|array|null $requestOptions = null,
    ): ReleaseFormListTaggableUsersResponse;
}
