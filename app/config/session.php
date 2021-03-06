<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Default Session Driver
	|--------------------------------------------------------------------------
	|
	| This option controls the default session "driver" that will be used on
	| requests. By default, we will use the lightweight native driver but
	| you may specify any of the other wonderful drivers provided here.
	|
<<<<<<< HEAD
	| Supported: "native", "cookie", "database", "apc",
=======
	| Supported: "file", "cookie", "database", "apc",
>>>>>>> 796cee92fa5aa2c766a790c117f1385936f13a26
	|            "memcached", "redis", "array"
	|
	*/

<<<<<<< HEAD
	'driver' => 'native',
=======
	'driver' => 'redis',
>>>>>>> 796cee92fa5aa2c766a790c117f1385936f13a26

	/*
	|--------------------------------------------------------------------------
	| Session Lifetime
	|--------------------------------------------------------------------------
	|
	| Here you may specify the number of minutes that you wish the session
	| to be allowed to remain idle before it expires. If you want them
<<<<<<< HEAD
	| to immediately expire when the browser closes, set it to zero.
=======
	| to immediately expire on the browser closing, set that option.
>>>>>>> 796cee92fa5aa2c766a790c117f1385936f13a26
	|
	*/

	'lifetime' => 120,

<<<<<<< HEAD
=======
	'expire_on_close' => false,

>>>>>>> 796cee92fa5aa2c766a790c117f1385936f13a26
	/*
	|--------------------------------------------------------------------------
	| Session File Location
	|--------------------------------------------------------------------------
	|
	| When using the native session driver, we need a location where session
	| files may be stored. A default has been set for you but a different
	| location may be specified. This is only needed for file sessions.
	|
	*/

	'files' => storage_path().'/sessions',

	/*
	|--------------------------------------------------------------------------
	| Session Database Connection
	|--------------------------------------------------------------------------
	|
<<<<<<< HEAD
	| When using the "database" session driver, you may specify the database
	| connection that should be used to manage your sessions. This should
	| correspond to a connection in your "database" configuration file.
=======
	| When using the "database" or "redis" session drivers, you may specify a
	| connection that should be used to manage these sessions. This should
	| correspond to a connection in your database configuration options.
>>>>>>> 796cee92fa5aa2c766a790c117f1385936f13a26
	|
	*/

	'connection' => null,

	/*
	|--------------------------------------------------------------------------
	| Session Database Table
	|--------------------------------------------------------------------------
	|
	| When using the "database" session driver, you may specify the table we
	| should use to manage the sessions. Of course, a sensible default is
	| provided for you; however, you are free to change this as needed.
	|
	*/

	'table' => 'sessions',

	/*
	|--------------------------------------------------------------------------
	| Session Sweeping Lottery
	|--------------------------------------------------------------------------
	|
	| Some session drivers must manually sweep their storage location to get
	| rid of old sessions from storage. Here are the chances that it will
	| happen on a given request. By default, the odds are 2 out of 100.
	|
	*/

	'lottery' => array(2, 100),

	/*
	|--------------------------------------------------------------------------
	| Session Cookie Name
	|--------------------------------------------------------------------------
	|
	| Here you may change the name of the cookie used to identify a session
	| instance by ID. The name specified here will get used every time a
	| new session cookie is created by the framework for every driver.
	|
	*/

	'cookie' => 'laravel_session',

	/*
	|--------------------------------------------------------------------------
	| Session Cookie Path
	|--------------------------------------------------------------------------
	|
	| The session cookie path determines the path for which the cookie will
	| be regarded as available. Typically, this will be the root path of
	| your application but you are free to change this when necessary.
	|
	*/

	'path' => '/',

	/*
	|--------------------------------------------------------------------------
	| Session Cookie Domain
	|--------------------------------------------------------------------------
	|
	| Here you may change the domain of the cookie used to identify a session
	| in your application. This will determine which domains the cookie is
	| available to in your application. A sensible default has been set.
	|
	*/

	'domain' => null,

<<<<<<< HEAD
=======
	/*
	|--------------------------------------------------------------------------
	| HTTPS Only Cookies
	|--------------------------------------------------------------------------
	|
	| By setting this option to true, session cookies will only be sent back
	| to the server if the browser has a HTTPS connection. This will keep
	| the cookie from being sent to you if it can not be done securely.
	|
	*/

	'secure' => false,

>>>>>>> 796cee92fa5aa2c766a790c117f1385936f13a26
);
