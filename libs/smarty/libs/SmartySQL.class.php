<?php

/**
 * @ignore
 */
require(dirname(__FILE__) . '/Smarty.class.php');

/**
 * Smarty SQL Class
 *
 * @package Smarty
 */
class SmartySQL extends Smarty
{
	public    $_version = self::SMARTY_VERSION;

	public    $pdo;                // PDO object
	protected $pdo_dsn;            // PDO dsn
	protected $pdo_username;       // PDO user
	protected $pdo_password;       // PDO password
	protected $pdo_driver_options; // PDO driver_options

	/**
	 * Initialize new SmartySQL object
	 *
	 * @param array $options options to set during initialization, e.g. array( 'forceCompile' => false )
	 */
	public function __construct(array $options=array())
	{
		parent::__construct($options);

		$this->pdo_dsn            = $options['pdo_dsn'];
		$this->pdo_username       = $options['pdo_username'];
		$this->pdo_password       = $options['pdo_password'];
		$this->pdo_driver_options = $options['pdo_driver_options'];

		try
		{
			$this->pdo = new PDO($this->pdo_dsn, $this->pdo_username, $this->pdo_password, $this->pdo_driver_options);
		}
		catch (PDOException $e)
		{
			throw new SmartyException('PDO resource failed: ' . $e->getMessage());
		}
	}
}

?>