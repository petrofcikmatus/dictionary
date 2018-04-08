<?php

namespace App\Twig\Extension;

use App\Entity\AbstractWordInterface;

class WordGenderExtension extends \Twig_Extension
{
    public function getFilters(): array
    {
        return [
            new \Twig_SimpleFilter('gender_as_string', function (int $gender) {
                return $this->convertGenderIdToString($gender);
            }),
        ];
    }

    private function convertGenderIdToString(int $gender): string
    {
        switch ($gender) {
            case AbstractWordInterface::GENDER_MASCULINE:
                return 'm';
            case AbstractWordInterface::GENDER_FEMININE:
                return 'ž';
            case AbstractWordInterface::GENDER_NEUTER:
                return 's';
            case AbstractWordInterface::GENDER_UNKNOWN:
            default:
                return '';
        }
    }
}
