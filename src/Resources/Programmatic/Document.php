<?php

namespace Bildvitta\IssVendas\Resources\Programmatic;

use Bildvitta\IssVendas\Contracts\Resources\Programmatic\DocumentContract;

class Document implements DocumentContract
{
    private Programmatic $programmatic;

    public function __construct(Programmatic $vendas)
    {
        $this->programmatic = $vendas;
    }

    public function validate(string $customerUuid)
    {
        return $this->programmatic->vendas->request->post(
            sprintf(self::ENDPOINT_VALIDATE, $customerUuid)
        )->throw()->object();
    }

    public function deleteValidation(string $customerUuid, array $data)
    {
        return $this->programmatic->vendas->request->post(
            sprintf(self::ENDPOINT_DELETE_VALIDATION, $customerUuid),
            $data
        )->throw()->object();
    }
}
