<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('exec_bash_script')) {

	function exec_bash_script($command_script, $stream)
	{
		$connection = ssh2_connect('198.211.125.28', '29937');
		if (ssh2_auth_password($connection, 'iamchill', 'wfKXXOJINLHhD4iOpMbW')) {
			if ($stream === TRUE) {
				$command_script = $comma_separated = implode(" ", $command_script);
				$stream = ssh2_exec($connection, "echo wfKXXOJINLHhD4iOpMbW | sudo -S /bin/bash /opt/scripts/$command_script");
				stream_set_blocking($stream, true);

				return stream_get_contents($stream);
			} else {
				$command_script = $comma_separated = implode(" ", $command_script);
				if (ssh2_exec($connection, "echo wfKXXOJINLHhD4iOpMbW | sudo -S /bin/bash /opt/scripts/$command_script")) {
					return TRUE;
				}
			}
		}
		return FALSE;
	}
}