<?php

namespace Iterator;

interface Aggregate {
    public function createIterator(): iIterator;
}