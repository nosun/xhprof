<?php
if (extension_loaded('xhprof')) {
    $xhprof_config			= require __DIR__ . '/../config.inc.php';
    if (!empty($xhprof_config['enable']) && $xhprof_config['enable']()) {
        xhprof_enable(XHPROF_FLAGS_MEMORY | XHPROF_FLAGS_CPU);
        register_shutdown_function(function() use ($xhprof_config){
            $xhprof_data	= xhprof_disable();
            if (function_exists('fastcgi_finish_request')) {
                fastcgi_finish_request();
            }
            require_once __DIR__ . '/../xhprof_lib/utils/xhprof_runs.php';
            $xhprof_data_obj	= new XHProfRuns_Default();
            $xhprof_data_obj->save_run($xhprof_data);
        });
    }
}
