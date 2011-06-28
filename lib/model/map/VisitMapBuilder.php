<?php


/**
 * This class adds structure of 'visit' table to 'propel' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * 06/28/11 12:06:06
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class VisitMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.VisitMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(VisitPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(VisitPeer::TABLE_NAME);
		$tMap->setPhpName('Visit');
		$tMap->setClassname('Visit');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, 11);

		$tMap->addForeignKey('PATIENT_ID', 'PatientId', 'INTEGER', 'patient', 'ID', false, 11);

		$tMap->addForeignKey('DOCTOR_ID', 'DoctorId', 'INTEGER', 'employee', 'ID', false, 11);

		$tMap->addForeignKey('WARD_BED_ID', 'WardBedId', 'INTEGER', 'ward_bed', 'ID', false, 11);

		$tMap->addForeignKey('WARD_DOC_ID', 'WardDocId', 'INTEGER', 'employee', 'ID', false, 11);

		$tMap->addColumn('ROOM_ID', 'RoomId', 'INTEGER', false, 11);

		$tMap->addColumn('VISIT_TYPE', 'VisitType', 'VARCHAR', false, 10);

		$tMap->addColumn('BP', 'Bp', 'VARCHAR', false, 10);

		$tMap->addColumn('TEMP', 'Temp', 'VARCHAR', false, 10);

		$tMap->addColumn('PULSE', 'Pulse', 'VARCHAR', false, 10);

		$tMap->addColumn('DIET', 'Diet', 'VARCHAR', false, 500);

		$tMap->addColumn('DESCRIPTION', 'Description', 'VARCHAR', false, 5000);

		$tMap->addColumn('TIME', 'Time', 'VARCHAR', false, 10);

		$tMap->addColumn('VISIT_DATE', 'VisitDate', 'DATE', false, null);

		$tMap->addColumn('ADMIT_DATE', 'AdmitDate', 'DATE', false, null);

		$tMap->addColumn('DISCHARGE_DATE', 'DischargeDate', 'DATE', false, null);

		$tMap->addColumn('FEE', 'Fee', 'VARCHAR', false, 10);

		$tMap->addColumn('FEE_PAID', 'FeePaid', 'VARCHAR', false, 10);

		$tMap->addColumn('STATUS', 'Status', 'VARCHAR', false, 10);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'DATE', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'DATE', false, null);

	} // doBuild()

} // VisitMapBuilder
