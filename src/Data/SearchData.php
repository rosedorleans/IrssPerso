<?php

namespace App\Data;

use App\Entity\CategoryFormation;
use App\Entity\City;

class SearchData
{
    /**
     * @var string
     */
    public $search = '';

    /**
     * @var CategoryFormation[]
     */
    public $categories = [];

    /**
     * @var City[]
     */
    public $cities = [];

}