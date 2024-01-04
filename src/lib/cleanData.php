<?php

function cleanData(string $data):string
{
    return trim(htmlentities($data));
}