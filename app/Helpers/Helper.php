<?php


/**
 * @param $arr
 * @param bool $exit
 */
function pr($arr, $exit = true)
{
    echo '<pre>';
    print_r($arr);
    echo '</pre>';

    if ($exit) {
        die;
    }
}

if (! function_exists('divnum')) {
    function divnum($numerator, $denominator)
    {
        return $denominator == 0 ? 0 : ($numerator / $denominator);
    }
}

/**
 * Chuyen tieng viet co dau sang khong dau
 */
function convert_vi_to_en($str, $parse_spial_str = true)
{
    $characters = [
        '/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/' => 'a',
        '/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/' => 'e',
        '/ì|í|ị|ỉ|ĩ/' => 'i',
        '/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/' => 'o',
        '/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/' => 'u',
        '/ỳ|ý|ỵ|ỷ|ỹ/' => 'y',
        '/đ/' => 'd',
        '/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/' => 'A',
        '/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/' => 'E',
        '/Ì|Í|Ị|Ỉ|Ĩ/' => 'I',
        '/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/' => 'O',
        '/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/' => 'U',
        '/Ỳ|Ý|Ỵ|Ỷ|Ỹ/' => 'Y',
        '/Đ/' => 'D',
    ];

    $replacement = '';
    if ($parse_spial_str) {
        $replacement = '-';
    }

    $characters['/[^A-Za-z0-9\/\-]/'] = $replacement;
    $characters['/ /'] = $replacement;

    return preg_replace(array_keys($characters), array_values($characters), $str);
}

/**
 * Create URL Title
 *
 * Takes a "title" string as input and creates a
 * human-friendly URL string with a "separator" string
 * as the word separator.
 *
 * @todo    Remove old 'dash' and 'underscore' usage in 3.1+.
 * @param    string $str Input string
 * @param    string $separator Word separator
 *            (usually '-' or '_')
 * @param    bool $lowercase Whether to transform the output string to lowercase
 * @return    string
 */
function url_title($str, $separator = '-', $lowercase = true)
{
    if(!is_string($str)) return $str;

    if ($separator === 'dash') {
        $separator = '-';
    } elseif ($separator === 'underscore') {
        $separator = '_';
    }

    $q_separator = preg_quote($separator, '#');

    $trans = [
        '&.+?;' => '',
        //'[^\w\d _-]' => '',
        '\s+' => $separator,
        '(' . $q_separator . ')+' => $separator,
    ];

    $str = strip_tags($str);
    foreach ($trans as $key => $val) {
        $str = preg_replace('#' . $key . '#i' . (true ? 'u' : ''), $val, $str);
    }

    if ($lowercase === true) {
        $str = strtolower($str);
    }

    return trim(trim($str, $separator));
}

/**
 * Auto gen model
 * @param string $prefix
 * @return string
 */
function gen_model($data, $prefix = 'P', $start = 'P')
{
    if (isset($data['product_description']) && count($data['product_description'])) {
        $description = reset($data['product_description']);
        if(!is_string($description)) return $description;
        $prefix = strtoupper(substr(url_title(convert_vi_to_en($description)), 0, 2));
    }

    return $start . $prefix . rand(1111, 9999);
}

/**
 * Xu ly tien dau vao
 * @param float $amount So tien
 * @param bool $natural Co chuyen amount ve so nguyen duong hay khong
 */
function currencyHandleInput($amount, $natural = false)
{
    $amount = str_replace(',', '', $amount);
    $amount = floatval($amount);

    if ($natural) {
        $amount = max(0, $amount);
    }

    return $amount;
}

if (! function_exists('licenseData')) {
    /**
     * @return mixed|null
     */
    function licenseData()
    {
        $license_file = storage_path() .'/license/license.json';
        if (file_exists($license_file)) {
            $content = file_get_contents($license_file);
            if (! $content) {
                return null;
            }

            $object = json_decode($content);
            if (isset($_GET['disable_copyright']) && is_object($object) && isset($object->copyright->brand)
            ) {
                $object->copyright->brand = '';
            }

            return $object;
        }

        return null;
    }
}

if (! function_exists('_array_merge')) {
    /**
     * @param array $arr1
     * @param array $arr2
     * @return array
     */
    function _array_merge(array $arr1, array $arr2)
    {
        foreach ($arr2 as $k => $v) {
            $arr1[] = $v;
        }

        return $arr1;
    }
}

function seo_url($str)
{
    return Illuminate\Support\Str::slug($str);
}

function slugToTitle($slug)
{
    return Illuminate\Support\Str::title(str_replace('-', ' ', $slug));
}

function number_format_to_int($number)
{
    return intval(str_replace(',', '', $number));
}

function countries(){
    return ['Nhật Bản', 'Trung Quốc'];
}

function years(){
    $startYear = 2003;
    $endYear = 2023;
    $years = [];
    
    for ($year = $startYear; $year <= $endYear; $year++) {
        $years[] = $year;
    }
    return $years;
}
