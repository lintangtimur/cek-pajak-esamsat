<?php

namespace Stelin\CekPajakApi\Auth;

class UserEntity
{
    public int $id;
    public string $uuid;
    public string $name;
    public string $email;
    public mixed $emailVerifiedAt;
    public string $createdAt;
    public string $updatedAt;

    /**
     * @param \stdClass $data
     * @return self
     */
    public static function fromJson(\stdClass $data): self
    {
        $instance                  = new self();
        $instance->id              = $data->id;
        $instance->uuid            = $data->uuid;
        $instance->name            = $data->name;
        $instance->email           = $data->email;
        $instance->emailVerifiedAt = $data->email_verified_at ?? null;
        $instance->createdAt       = $data->created_at;
        $instance->updatedAt       = $data->updated_at;

        return $instance;
    }
}
