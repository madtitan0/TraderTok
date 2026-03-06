<?php 
$key = 'f2f7ef3b-8168-4a6e-be8d-aab31fdb980e';
$cache_file = __DIR__ . '/cache/api_data.json';
$cache_time = 3600; // 1 hour

if (file_exists($cache_file) && (time() - filemtime($cache_file) < $cache_time)) {
    $json = file_get_contents($cache_file);
} else {
    // Attempt to fetch fresh data
    $json = file_get_contents('https://cdn-customer.theteampower.com/data/'.$key.'.json');
    if($json){
        if (!file_exists(__DIR__ . '/cache')) {
            mkdir(__DIR__ . '/cache', 0777, true);
        }
        file_put_contents($cache_file, $json);
    } else if (file_exists($cache_file)) {
        // If fetch fails, use stale cache
        $json = file_get_contents($cache_file);
    }
}

if(!$json){
    die('json not found...');
}
$api = json_decode($json);
 


if (!$api) {
    die('server connection error...');
}
if(isset($api->status) =='error'){
    die($api->message);
}
$get = $api[0];
// die();
// function makeMenu($orig_tree)
// {
//     $parent_set = [];
//     $result = [];
//     foreach ($orig_tree as $node) {
//         $node->children = [];
//         if ($node->parent_id == 0) {
//             $result[] = $node;
//             $parent_set[$node->id] = &$result[count($result) - 1];
//         } else {
//             $parent = &$parent_set[$node->parent_id];
//             $parent->children[] = $node;
//             $parent_set[$node->id] = &$parent->children[count($parent->children) - 1];
//         }
//     }

//     return $result;
// }

function makeMenu($orig_tree)
{
    $parent_set = [];
    $result = [];

    foreach ($orig_tree as $node) {
        $node->children = [];

        if ($node->parent_id == 0) {
            // Top-level menu
            $result[] = $node;
            $parent_set[$node->id] = &$result[count($result) - 1];
        } else {
            // If parent does not exist yet, create a placeholder
            if (!isset($parent_set[$node->parent_id])) {
                $placeholder = (object)[
                    'id' => $node->parent_id,
                    'parent_id' => 0,
                    'title' => 'Placeholder',
                    'children' => []
                ];
                $result[] = $placeholder;
                $parent_set[$node->parent_id] = &$result[count($result) - 1];
            }

            $parent = &$parent_set[$node->parent_id];
            $parent->children[] = $node;
            $parent_set[$node->id] = &$parent->children[count($parent->children) - 1];
        }
    }

    return $result;
}


$menus = makeMenu($get->menus);
$theme = $get->theme;
$sliders = $get->sliders;
$cards = $get->cards;
$counters = $get->counters;
$imageCards = $get->image_cards;
$companies = $get->companies;
$comments = $get->comments;
$extra_menus = $get->extra_menu;
$popups = $get->popup;
$other_pages = $get->other_page;
$blog = $get->blog;
$blog_category= $get->blog_category;
$properties= $get->properties;
$accounts= $get->accounts;
$questions= $get->questions;
$advantages= $get->advantages;
//get page 
$page = @$_GET['page'];    
$getURL = @$_GET['url'];  

 