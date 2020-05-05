<?php

/**
 * Render a form for activate a resource
 *
 * @param string $resource Example: users, posts, articles
 * @param integer $id
 * @param integer $active Example: Enter boolean value, 0 or 1
 * @return string
 */
function activate_resource($resource, $id, $active = 0)
{
    $output  = '<form action="'.route('admin.'.$resource.'.active', $id).'" method="POST">';
    $output .= '<input type="hidden" name="_token" value="'.csrf_token().'">';
    $output .= '<input type="hidden" name="_method" value="PATCH">';

    if($active) {
        $output .= '<button class="btn btn-success" type="submit">';
        $output .= '<span class="text-white fas fa-check"></span>';
    } else {
        $output .= '<button class="btn btn-danger" type="submit">';
        $output .= '<span class="text-white fas fa-times"></span>';
    }

    $output .= '</button>';
    $output .= '</form>';

    return $output;
}
