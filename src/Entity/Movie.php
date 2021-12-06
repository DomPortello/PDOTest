<?php

namespace App\Entity;

use DateTime;

class Movie
{
    private int $id;
    private string $name;
    private string $type;
    private DateTime $launchAt;
    private string $description;

    public function __construct(string $date)
    {
        $this->id = 0;
        $this->name = '';
        $this->type = '';
        $this->launchAt = new DateTime($date);
        $this->description = '';

    }

    public function hydrate(array $attributes): ?Movie
    {
        foreach ($attributes as $key => $value) {
            $keyExplodedUppercase = [];
            //Faire un tableau avec un mot a chaque _
            $keyExploded = explode('_', $key);

            //Première lettre de chaque mot en majuscule
            foreach ($keyExploded as $index => $attributeNamePart) {
                $keyExplodedUppercase[$index] = ucfirst($attributeNamePart);
            }

            //On reconstruit le nom de l'attribut
            $keyImploded = implode('', $keyExplodedUppercase);

            $method = 'set' . ucfirst($keyImploded);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return DateTime
     */
    public function getLaunchAt(): DateTime
    {
        return $this->launchAt;
    }

    /**
     * @param DateTime $launchAt
     */
    public function setLaunchAt(string $launchAt): void
    {
        $this->launchAt = (new DateTime($launchAt));
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

}