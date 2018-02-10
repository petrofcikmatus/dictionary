<?php

namespace App\Entity;

use App\EntityTrait\Timestamps;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SymbolRepository")
 * @ORM\Table(name="symbols")
 * @ORM\HasLifecycleCallbacks()
 */
class Symbol implements SymbolInterface
{
    use Timestamps;

    //-------------------------------------------------------------------------

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="bigint", name="id")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string", name="title")
     * @var string
     */
    private $title = '';

    /**
     * @ORM\Column(type="string", name="content", unique=true)
     * @var string
     */
    private $content = '';

    /**
     * @ORM\Column(type="string", name="description")
     * @var string
     */
    private $description = '';

    //-------------------------------------------------------------------------

    public function __construct(string $title, string $content, string $description = '')
    {
        $this->setTitle($title);
        $this->setContent($content);
        $this->setDescription($description);
    }

    public function __toString(): string
    {
        return $this->getContent();
    }

    //-------------------------------------------------------------------------

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
}
