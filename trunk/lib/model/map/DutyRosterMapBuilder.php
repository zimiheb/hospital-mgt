<?php


/**
 * This class adds structure of 'duty_roster' table to 'propel' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * 06/28/11 12:06:05
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class DutyRosterMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.DutyRosterMapBuilder';

	/**
	 * The database map.
	 */
	private $dbMap;

	/**
	 * Tells us if this DatabaseMapBuilder is built so that we
	 * don't have to re-build it every time.
	 *
	 * @return     boolean true if this DatabaseMapBuilder is built, false otherwise.
	 */
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	/**
	 * Gets the databasemap this map builder built.
	 *
	 * @return     the databasemap
	 */
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	/**
	 * The doBuild() method builds the DatabaseMap
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap(DutyRosterPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(DutyRosterPeer::TABLE_NAME);
		$tMap->setPhpName('DutyRoster');
		$tMap->setClassname('DutyRoster');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, 11);

		$tMap->addForeignKey('EMPLOYEE_ID', 'EmployeeId', 'INTEGER', 'employee', 'ID', false, 11);

		$tMap->addForeignKey('DUTY_PLACE_ID', 'DutyPlaceId', 'INTEGER', 'duty_place', 'ID', false, 11);

		$tMap->addColumn('DUTY_DATE', 'DutyDate', 'DATE', false, null);

		$tMap->addColumn('FROM', 'From', 'VARCHAR', false, 10);

		$tMap->addColumn('TO', 'To', 'VARCHAR', false, 10);

		$tMap->addColumn('PRESENT', 'Present', 'VARCHAR', false, 5);

		$tMap->addForeignKey('SUBSTITUTE_ID', 'SubstituteId', 'INTEGER', 'employee', 'ID', false, 11);

		$tMap->addColumn('STATUS', 'Status', 'VARCHAR', false, 10);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'DATE', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'DATE', false, null);

	} // doBuild()

} // DutyRosterMapBuilder
