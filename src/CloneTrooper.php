<?php

namespace Alucas\td3;

class CloneTrooper
{
    public string $name;
    public string $description;
    public string $imageLink;

    public function __construct(string $name = "", string $description = "", string $imageLink = "")
    {
        $this->name = $name;
        $this->description = $description;
        $this->imageLink = $imageLink;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}