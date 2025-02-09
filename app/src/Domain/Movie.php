<?php

declare(strict_types=1);

namespace App\Domain;

use Symfony\Component\Serializer\Attribute\SerializedName;

final readonly class Movie
{
    public function __construct(private string $name) {}

    #[SerializedName('name')]
    public function getName(): string
    {
        return $this->name;
    }
}
