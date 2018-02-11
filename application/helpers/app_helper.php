<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// --------------------------------------------------------------------

if (!function_exists('access')) {
    /**
     * Elements
     *
     * Returns only the array items specified. Will return a default value if
     * it is not set.
     *
     * @token   token
     * @inArray array
     * @return  mixed   depends on what the array contains
     */
    function access()
    {
        $ci = &get_instance();
        $access = $ci->session->userdata('access');
        return (null !== $access) && is_array($access) && isset($access['view_mode']) && (isset($access['branch_id']) || $access['view_mode'] == 1 || (isset($access['role_id']) && $access['role_id'] == 1)) && count($access) > 0;
    }
}

if (!function_exists('logout')) {

    function logout()
    {
        $ci = &get_instance();
        $ci->session->unset_userdata('access');
        redirect(site_url('login'));
    }
}

if (!function_exists('manual_log')) {

    function manual_log($file_name = '', $content = array())
    {
        try {
            if (!is_dir('log')) {
                mkdir('log');
            }
            if (!is_null_or_empty($file_name)) {
                file_put_contents('log/' . $file_name . '.txt', json_encode($content), FILE_APPEND);
            }
        } catch (Exception $e) {

        }
        return true;
    }
}

if (!function_exists('ci_breadcrumb')) {
    function ci_breadcrumb($initial_crumb = FALSE, $initial_crumb_url = FALSE, $initial_crumb_icon = FALSE)
    {
        $ci = &get_instance();
        $open_tag = '<ol class="breadcrumb">';
        $close_tag = '</ol>';
        $crumb_open_tag = '<li>';
        $active_crumb_open_tag = '<li class="active">';
        $crumb_close_tag = '</li>';
        $total_segments = $ci->uri->total_segments();
        $breadcrumbs = $open_tag;
        if ($initial_crumb) {
            $breadcrumbs .= $crumb_open_tag;
            $breadcrumbs .= ci_breadcrumb_href($initial_crumb, $initial_crumb_url, TRUE, TRUE, $initial_crumb_icon);
        }
        $segment = '';
        $crumb_href = '';
        for ($i = 1; $i <= $total_segments; $i++) {
            $segment = $ci->uri->segment($i);
            $crumb_href .= $ci->uri->segment($i) . '/';
            if ($total_segments > $i) {
                $breadcrumbs .= $crumb_open_tag;
                $breadcrumbs .= ci_breadcrumb_href($segment, $crumb_href);
            } else {
                $breadcrumbs .= $active_crumb_open_tag;
                $breadcrumbs .= ci_breadcrumb_href($segment, $crumb_href, FALSE, FALSE);
            }
            $breadcrumbs .= $crumb_close_tag;
        }
        $breadcrumbs .= $close_tag;
        return $breadcrumbs;
    }
}

if (!function_exists('ci_breadcrumb_href')) {
    function ci_breadcrumb_href($uri_segment, $crumb_href = FALSE, $initial = FALSE, $active_link = TRUE, $crumb_icon = FALSE)
    {
        $ci = &get_instance();
        $crumb_href = rtrim($crumb_href, '/');
        if ($active_link) {
            if ($initial) {
                return ($crumb_icon ? '<span class="' . $crumb_icon . '"></span> ' : '') . '<a href="' . ($crumb_href ? $crumb_href : site_url()) . '">' . ucwords(str_replace(array('-', '_'), ' ', $uri_segment)) . '</a>';
            } else {
                return ($crumb_icon ? '<span class="' . $crumb_icon . '"></span> ' : '') . '<a href="' . site_url($crumb_href) . '">' . ucwords(str_replace(array('-', '_'), ' ', $uri_segment)) . '</a>';
            }
        } else {
            return ($crumb_icon ? '<span class="' . $crumb_icon . '"></span> ' : '') . ucwords(str_replace(array('-', '_'), ' ', $uri_segment));
        }
    }
}

if (!function_exists('fin_year')) {
    function fin_year($options = array())
    {
        //ret e.g 1718
        $finYear = (date('m') > 3) ? date('y') . (date('y') + 1) : (date('y') - 1) . date('y');
        if (count($options)) {
            //ret e.g 2017-2018
            if (isset($options['full']) && isset($options['seperator'])) {
                $seperator = $options['seperator'];
                $finYear = (date('m') > 3) ? date('Y') . $seperator . (date('Y') + 1) : (date('Y') - 1) . $seperator . date('Y');
            } //ret e.g 2017-18
            elseif (isset($options['first_full']) && isset($options['seperator'])) {
                $seperator = $options['seperator'];
                $finYear = (date('m') > 3) ? date('Y') . $seperator . (date('y') + 1) : (date('Y') - 1) . $seperator . date('y');
            } //ret e.g 17-18
            elseif (isset($options['seperator'])) {
                $seperator = $options['seperator'];
                $finYear = (date('m') > 3) ? date('y') . $seperator . (date('y') + 1) : (date('y') - 1) . $seperator . date('y');
            } //ret e.g 20172018
            elseif (isset($options['full'])) {
                $finYear = (date('m') > 3) ? date('Y') . (date('Y') + 1) : (date('Y') - 1) . date('Y');
            } //ret e.g 201718
            elseif (isset($options['first_full'])) {
                $finYear = (date('m') > 3) ? date('Y') . (date('y') + 1) : (date('Y') - 1) . date('y');
            }
        }
        return $finYear;
    }
}
if (!function_exists('getSessionData')) {
    function getSessionData($key = null)
    {
        $ci = &get_instance();
        $sessData = $ci->session->userdata('access');
        return ($key) ? $sessData[$key] : $sessData;
    }
}
if (!function_exists('branchWhere')) {
    function branchWhere($tableAlias = null, $branchColName = "branch_code")
    {
        if (getSessionData("branch_code")) {
            $ci = &get_instance();
            $ci->db->where(($tableAlias) ? $tableAlias . "." . $branchColName : $branchColName, getSessionData("branch_code"));
        }
    }
}
if (!function_exists('checkRight')) {
    function checkRight($pageTitle)
    {
        $active_tabs = getSessionData("active_tabs");
        $view_mode = getSessionData('view_mode');
        $rights = implode(',', $active_tabs[$view_mode]);
        if (!in_array($pageTitle, explode(',', $rights))) {
            redirect(getSessionData("redirect_url"));
        }
    }
}
if (!function_exists('finYearWhere')) {
    function finYearWhere($tableAlias = null, $finYearColName = "fin_year", $options = array())
    {
        if (fin_year($options)) {
            $ci = &get_instance();
            $ci->db->where(($tableAlias) ? $tableAlias . "." . $finYearColName : $finYearColName, fin_year($options));
        }
    }
}