<?php

namespace Stelin\CekPajakApi\Auth;

class LoginEntity
{
    public string $accessToken;
    public string $tokenType;
    public int $expiresIn;
    public \Stelin\CekPajakApi\Auth\UserEntity $user;

    /**
     * @param \stdClass $data
     * @return self
     */
    public static function fromJson(\stdClass $data): self
    {
        $instance              = new self();
        $instance->accessToken = $data->access_token;
        $instance->tokenType   = $data->token_type;
        $instance->expiresIn   = $data->expires_in;
        $instance->user        = UserEntity::fromJson($data->user);

        return $instance;
    }
}
