<?php

namespace Bildvitta\IssVendas\Contracts\Resources\Programmatic;

interface DocumentContract
{
    public const ENDPOINT_VALIDATE = '/programmatic/customers/%s/documents/validate';

    public const ENDPOINT_DELETE_VALIDATION = '/programmatic/customers/%s/documents/delete';
}
