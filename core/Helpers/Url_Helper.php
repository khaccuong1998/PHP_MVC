<?php
    // base_url('user/show?id=1')
    function base_url($uri = '') {
		$uri = str_replace('?', '&', $uri);
		$uri_array = explode('/', $uri);
		$module = $uri_array[0];
		$action = $uri_array[1];

		if ($module && $action) {
			return BASE_URL . "/?module={$module}&action={$action}";
		}
		return BASE_URL;
    }

    function redirect($uri) {
        $url = base_url($uri);
        header("location: $url");
        exit;
    }