<?php


/**
 * This class adds structure of 'patient' table to 'propel' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * 06/16/11 00:51:22
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class PatientMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.PatientMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(PatientPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(PatientPeer::TABLE_NAME);
		$tMap->setPhpName('Patient');
		$tMap->setClassname('Patient');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, 11);

		$tMap->addColumn('ID_NUMBER', 'IdNumber', 'VARCHAR', false, 20);

		$tMap->addColumn('CNIC', 'Cnic', 'VARCHAR', false, 25);

		$tMap->addColumn('USERNAME', 'Username', 'VARCHAR', false, 50);

		$tMap->addColumn('PASSWORD', 'Password', 'VARCHAR', false, 50);

		$tMap->addColumn('NAME', 'Name', 'VARCHAR', false, 100);

		$tMap->addColumn('FATHER_NAME', 'FatherName', 'VARCHAR', false, 50);

		$tMap->addColumn('DOB', 'Dob', 'DATE', false, null);

		$tMap->addColumn('GENDER', 'Gender', 'VARCHAR', false, 10);

		$tMap->addColumn('ADDRESS', 'Address', 'VARCHAR', false, 255);

		$tMap->addColumn('CONTACT_RES', 'ContactRes', 'VARCHAR', false, 20);

		$tMap->addColumn('CONTACT_CELL', 'ContactCell', 'VARCHAR', false, 20);

		$tMap->addColumn('EMERGENCY_CONTACT', 'EmergencyContact', 'VARCHAR', false, 20);

		$tMap->addColumn('EMAIL', 'Email', 'VARCHAR', false, 100);

		$tMap->addColumn('BLOOD_GROUP', 'BloodGroup', 'VARCHAR', false, 5);

		$tMap->addColumn('DISEASE', 'Disease', 'VARCHAR', false, 255);

		$tMap->addColumn('ALLERGY', 'Allergy', 'VARCHAR', false, 255);

		$tMap->addColumn('DRUG_ALLERGY', 'DrugAllergy', 'VARCHAR', false, 255);

		$tMap->addColumn('STATUS', 'Status', 'VARCHAR', false, 10);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'DATE', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'DATE', false, null);

	} // doBuild()

} // PatientMapBuilder
