<?php
return array(
	'url_base' => 'http://xhprof.app',
	'url_static' => 'http://xhprof.app/public/', // When undefined, it defaults to $config['url_base'] . 'public/'. This should be absolute URL.
    'enable' => function() {
        return true;
    }
);
