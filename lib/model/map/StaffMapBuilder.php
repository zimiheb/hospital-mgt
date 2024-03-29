<?php


/**
 * This class adds structure of 'staff' table to 'propel' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * 04/10/11 23:39:29
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class StaffMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.StaffMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(StaffPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(StaffPeer::TABLE_NAME);
		$tMap->setPhpName('Staff');
		$tMap->setClassname('Staff');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, 11);

		$tMap->addColumn('DEPARTMENT_ID', 'DepartmentId', 'INTEGER', false, 11);

		$tMap->addColumn('DESIGNATION_ID', 'DesignationId', 'INTEGER', false, 11);

		$tMap->addColumn('ROLE_ID', 'RoleId', 'INTEGER', false, 11);

		$tMap->addColumn('NAME', 'Name', 'VARCHAR', false, 100);

		$tMap->addColumn('CNIC', 'Cnic', 'VARCHAR', false, 50);

		$tMap->addColumn('DOB', 'Dob', 'DATE', false, null);

		$tMap->addColumn('GENDER', 'Gender', 'VARCHAR', false, 10);

		$tMap->addColumn('PERMANENT_ADDRESS', 'PermanentAddress', 'VARCHAR', false, 255);

		$tMap->addColumn('CONTACT_RES', 'ContactRes', 'VARCHAR', false, 50);

		$tMap->addColumn('CONTACT_CELL', 'ContactCell', 'VARCHAR', false, 50);

		$tMap->addColumn('CONTACT_OFF', 'ContactOff', 'VARCHAR', false, 50);

		$tMap->addColumn('EMERGENCY_CONTACT', 'EmergencyContact', 'VARCHAR', false, 50);

		$tMap->addColumn('EMPLOYMENT_DATE', 'EmploymentDate', 'DATE', false, null);

		$tMap->addColumn('LOCAL_RESIDENT', 'LocalResident', 'VARCHAR', false, 3);

		$tMap->addColumn('QUALIFICATION', 'Qualification', 'VARCHAR', false, 1000);

		$tMap->addColumn('STATUS', 'Status', 'VARCHAR', false, 10);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'DATE', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'DATE', false, null);

	} // doBuild()

} // StaffMapBuilder
