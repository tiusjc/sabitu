<?php
	/*
	 * Copyright © 2012 by Eric Schultz.
	 *
	 * Issued under the MIT License
	 *
	 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"),
	 * to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense,
	 * and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
	 * s
	 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
	 *
	 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
	 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
	 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
	 */


	/*
	 *	Configuration Definitions
	 *	-------------------------
	 *
	 *	Defaults:
	 *		'repository' => '*'
	 *		'branch' => '*'
	 *		'username' => '*'
	 *		'execute' => array()
	*
	 */

	$boolDebugLogging = TRUE;

	$arrConfig['SABITU-DEV'] = array(
		'repository' => 'sabitu',
<<<<<<< HEAD
<<<<<<< HEAD
                'branch'     => 'dev',
                'execute'    => array('cd /var/www/sabitu-dev; git reset --hard 2>&1;git clean -f -d 2>&1;git pull producao dev'));
=======
								'branch'     => 'dev',
								'execute'    => array('cd /var/www/sabitu-dev; git reset --hard 2>&1;git clean -f -d 2>&1;git pull develop dev'));
>>>>>>> e416042f181c4bda724d2e76a1b437c1526012bb
=======
								'branch'     => 'dev',
								'execute'    => array('cd /var/www/sabitu-dev; git reset --hard 2>&1;git clean -f -d 2>&1;git pull develop dev'));
=======
                'branch'     => 'dev',
                'execute'    => array('cd /var/www/sabitu-dev; git reset --hard 2>&1;git clean -f -d 2>&1;git pull producao dev'));
>>>>>>> dev
>>>>>>> master
