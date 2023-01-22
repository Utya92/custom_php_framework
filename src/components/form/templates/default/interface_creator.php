<?php
if (!defined('JOIN_CORE') || !JOIN_CORE) die();
function renderInputTags($params) {
//var_dump($params);
    foreach ($params['elements'] ?? [] as $el) {
        if ($el['type'] === "text" or $el['type'] === "number" or $el['type'] === "password"
            or $el['type'] === "radio" or $el['type'] === "checkbox") {
            $inputTag = '<input';
            if (array_key_exists('multiple', $el) and $el['multiple']) {
                $inputTag = $inputTag . " multiple ";
            }
            $inputTag = $inputTag . getProperties($el);
            if (array_key_exists('attr', $el)) {
                $inputTag = $inputTag . getAttributes($el['attr']);
            }
            $inputTag = $inputTag . '> <br>';
            echo $inputTag;
        }
        if ($el['type'] === "select") {
            $selectType = '<select';
            if (array_key_exists('multiple', $el) && $el['multiple']) {
                $selectType = $selectType . " multiple ";
            }
            $selectType = $selectType . getProperties($el);
            if (array_key_exists('attr', $el)) {
                $selectType = $selectType . getAttributes($el['attr']);
            }
            $selectType = $selectType . '>';
            echo $selectType;
            getOptions($el['list']);
            echo '</select> <br>';
        }

        if ($el['type'] === 'textarea') {
            $textAreaTag = " <textarea";
            $textAreaTag = $textAreaTag . getProperties($el);
            if (array_key_exists('attr', $el)) {
                $textAreaTag = $textAreaTag . getAttributes($el['attr']);
            }
            $textAreaTag = $textAreaTag . ">";
            echo $textAreaTag;
            echo "</textarea> <br>";
        }
    }
}


function getProperties($array): string {
    $properties = '';
    foreach ($array as $key => $value) {
        if ($key !== 'selected' and $key !== "elements" and $key !== "list" and $key !== "attr" and
            $key !== "multiple") {
            $properties = $properties . ' ' . $key . '="' . $value . '"';
        }
    }
    return $properties;
}


function getAttributes($array): string {
    $attribute = '';
    if (is_array($array)) {
        foreach ($array as $key => $value) {
            $attribute = $attribute . ' ' . $key . '="' . $value . '"';
        }
        return $attribute;
    }
    return '';
}

function getOptions($array) {
    foreach ($array as $option) {
        $temp = "<option";
        $temp = $temp . getProperties($option);
        if (array_key_exists('selected', $option) and $option['selected']) {
            $temp = $temp . " selected ";
        }
        if (array_key_exists('attr', $option)) {
            $temp = $temp . getAttributes($option['attr']);
        }
        $temp = $temp . " >" . $option['value'] . '</option>';
        echo $temp;
    }
}
