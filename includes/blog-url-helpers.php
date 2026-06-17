<?php

function blog_post_slug($post): string
{
    if (!is_object($post)) {
        return '';
    }

    foreach (['url_address', 'url', 'slug'] as $field) {
        if (!empty($post->{$field})) {
            $slug = trim((string) $post->{$field}, " \t\n\r\0\x0B/");
            if ($slug !== '') {
                return $slug;
            }
        }
    }

    return '';
}

function blog_post_href($post): string
{
    $slug = blog_post_slug($post);
    if ($slug !== '') {
        return './' . $slug;
    }

    if (is_object($post) && isset($post->id)) {
        return './blogDetail?id=' . rawurlencode((string) $post->id);
    }

    return './blog';
}

function blog_find_by_id(array $posts, $id): ?object
{
    if ($id === '' || $id === null) {
        return null;
    }

    foreach ($posts as $post) {
        if (is_object($post) && (string) $post->id === (string) $id) {
            return $post;
        }
    }

    return null;
}

function blog_find_by_slug(array $posts, string $slug): ?object
{
    $slug = trim($slug, " \t\n\r\0\x0B/");
    if ($slug === '') {
        return null;
    }

    foreach ($posts as $post) {
        if (!is_object($post)) {
            continue;
        }

        if (blog_post_slug($post) === $slug) {
            return $post;
        }
    }

    return null;
}

function blog_apply_detail_seo(object $get, object $post): void
{
    $blogMetaTitle = trim((string) ($post->title ?? ''));
    $get->title = $blogMetaTitle !== '' ? $blogMetaTitle . ' | TraderTok Blog' : 'Blog | TraderTok';
    $blogMetaDesc = trim((string) ($post->spot ?? ''));
    $get->desc = $blogMetaDesc !== '' ? $blogMetaDesc : 'Read this article on the TraderTok blog.';
    $get->keyw = 'TraderTok blog, ' . $blogMetaTitle;
}
