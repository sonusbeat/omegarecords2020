<?php

/**
 * Render a form for activate a resource
 *
 * @param string $resource Example: users, posts, articles
 * @param integer $id
 * @param integer $active Example: Enter boolean value, 0 or 1
 * @param string $size Example: 'lg', 'md', 'sm', 'xs'
 *
 * @return string
 */
function activate_resource($resource, $id, $active = 0, $size="sm")
{
    $output  = '<form action="'.route('admin.'.$resource.'.active', $id).'" method="POST" class="d-block">';
    $output .= '<input type="hidden" name="_token" value="'.csrf_token().'">';
    $output .= '<input type="hidden" name="_method" value="PATCH">';

    if($active) {
        $output .= '<button class="btn btn-success btn-'.$size.'" type="submit">';
        $output .= '<span class="text-white fas fa-eye"></span>';
    } else {
        $output .= '<button class="btn btn-danger btn-'.$size.'" type="submit">';
        $output .= '<span class="text-white fas fa-eye-slash"></span>';
    }

    $output .= '</button>';
    $output .= '</form>';

    return $output;
}

/**
 * Render a form for activate a resource
 *
 * @param string $resource Example: users, posts, articles
 * @param integer $id
 * @param integer $active Example: Enter boolean value, 0 or 1
 * @param string $size Example: 'lg', 'md', 'sm', 'xs'
 *
 * @return string
 */
function delete_resource($resource, $id, $active = 0, $size="sm")
{
    $output  = '<form action="'.route('admin.'.$resource.'.destroy', $id).'" id="delete" class="d-inline" method="POST">';
    $output .= '<input type="hidden" name="_token" value="'.csrf_token().'">';
    $output .= '<input type="hidden" name="_method" value="DELETE">';
    $output .= '<button class="btn btn-danger btn-'.$size.'" type="submit">';
    $output .= '<span class="text-white fas fa-trash"></span>';
    $output .= '</button>';
    $output .= '</form>';

    return $output;
}
