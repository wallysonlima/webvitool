<?php
	/* Developed by: Wallyson Lima
	   Email: wallyson.n.a.lima@gmail.com
	   Github: wallysonlima
	   Date: 03/05/2018
	*/

class Database
{

	function Database() {}

	function connection()
	{
		try
		{
			// Create object PDO, and connect with the Mysql database
			return (new PDO("mysql:host=localhost;dbname=mobivitool2", "root", "Unicamp2011&") );	
		}
		catch (PDOException $i)
		{
			print "Error: <code>" . $i->getMessage() . "</code>";
		}	
	}
}

?>