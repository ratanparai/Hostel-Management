<?php

/**
 * The auto-loading function, which will be called every time a file "is missing"
 * NOTE: don't get confused, this is not "__autoload", the now deprecated function
 *
 * The PHP Framework Interoperability Group (@see https://github.com/php-fig/fig-standards) recommends using
 * a standardized auto-loader @see  https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md so
 * we do.
 * NOTE: There is a running voting discussion on their mailing list (@see https://groups.google.com/forum/#!topic/php-fig/7g6n145XlbI)
 * but it still not marged. So I'm using the PSR-0 for now.
 *
 * @todo Need to update for PSR-4 .
 */
function autoload($class) {
	// if file does exits in LIBS_PATH folder [set in config/config.php]
	if (file_exists(LIBS_PATH . $class . ".php")) {
		require LIBS_PATH . $class . ".php";
	} else {

		/**
		 * For development purpose using plain error.
		 * TODO: Replace with Exception handling with error code.
		 */
		exit('The file ' . $class . '.php is missing inthe libs folder');

	}
}

/**
 * sql_autoload_register defines the function that is called every time a file is missing.
 * as I created this function above, every time a file is needed, autoload(TheNeededClass) is called.
 */
spl_autoload_register("autoload");

?>

