<?php
set_time_limit(60);
$key = 'f2f7ef3b-8168-4a6e-be8d-aab31fdb980e';
$localFile = __DIR__ . "/cache_$key.json";
$remoteUrl = "https://cdn-customer.theteampower.com/data/$key.json";
if (isset($_GET['check_remote'])) {
    $response = [
        'status' => 'nochange',
        'error' => false,
    ];
    $remoteJson = @file_get_contents($remoteUrl);
    if ($remoteJson) {
        if (md5($remoteJson) !== md5(@file_get_contents($localFile))) {
            file_put_contents($localFile, $remoteJson);
            $response['status'] = 'reload';
        }
    } else {
        $response['error'] = true;
    }

    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}


$warning = '';
if (file_exists($localFile)) {
    $json = file_get_contents($localFile);
    $api = json_decode($json);
    echo <<<HTML
    <script>
        fetch('?check_remote=1')
        .then(res => res.json())
        .then(data => {
            if (data.status === 'reload') {
                location.reload();
            } else if (data.error) {
                const warn = document.createElement('div');
                warn.style = "background:#fff3cd;color:#856404;padding:10px;margin:5px 0;border:1px solid #ffeeba;border-radius:5px;";
                warn.innerText = "⚠️ Remote server not found.";
                document.body.prepend(warn);
            }
        });
    </script>
    HTML;
} else {
    $json = @file_get_contents($remoteUrl);
    if (!$json) {
        die('
        <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <title>Under Maintenance</title>
                <link
                href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap"
                rel="stylesheet"
                />
                <style>
                * {
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                }

                body {
                    font-family: "Roboto", sans-serif;
                    background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
                    height: 100vh;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    color: #1f2937;
                }

                .container {
                    text-align: center;
                    background: white;
                    padding: 3rem 2rem;
                    border-radius: 16px;
                    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
                    max-width: 500px;
                    width: 90%;
                }

                h1 {
                    font-size: 2rem;
                    margin-bottom: 1rem;
                    color: #111827;
                }

                p {
                    font-size: 1rem;
                    color: #4b5563;
                }

                .emoji {
                    font-size: 8rem;
                    margin-top: -8rem;
                }
                </style>
            </head>
            <body>
                <div class="container">
                <div class="emoji">🚧</div>
                <h1>We\'re Under Maintenance</h1>
                <p>
                    We are currently performing some updates.<br />We\'ll be back shortly.
                </p>
                </div>
            </body>
        </html>
        ');
    }

    file_put_contents($localFile, $json);
    $api = json_decode($json);
    if (!$api) {
        die("api not found...");
    }

    if (isset($api->status) == 'error') {
        die($api->message);
    }
}



function makeMenu($orig_tree)
{
    $parent_set = [];
    $result = [];
    foreach ($orig_tree as $menu) {
        $menu->children = [];
        $parent_set[$menu->id] = $menu;
    }

    foreach ($orig_tree as $menu) {
        if ($menu->parent_id == 0) {
            $result[] = $menu;
        } else {
            if (isset($parent_set[$menu->parent_id])) {
                $parent_set[$menu->parent_id]->children[] = $menu;
            } else {
                echo "Parent ID ({$menu->parent_id}) not found. Menu ID: {$menu->id}\n";
            }
        }
    }

    return $result;
}

$get = $api[0];
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
$blog_category = $get->blog_category;
$properties = $get->properties;
$accounts = $get->accounts;
$questions = $get->questions;
$advantages = $get->advantages;
$page = @$_GET['page'];
$getURL = @$_GET['url'];
