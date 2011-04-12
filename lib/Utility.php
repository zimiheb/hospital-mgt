<?php

class Utility {
	
	
	public function dateDiff($startDate, $endDate) 
{ 
    // Parse dates for conversion 
    $startArry = date_parse($startDate); 
    $endArry = date_parse($endDate); 

    // Convert dates to Julian Days 
    $start_date = gregoriantojd($startArry["month"], $startArry["day"], $startArry["year"]) - 1; 
    $end_date = gregoriantojd($endArry["month"], $endArry["day"], $endArry["year"]); 

    // Return difference 
    return round(($end_date - $start_date), 0); 
} 

public static function GetMonth($date) {
		
		$date_year = substr ( $date, 0, 4 );
		$date_month = substr ( $date, 5, 2 );
		$date_day = substr ( $date, 8, 2 );

		if ($date_year == "0000" || $date == "")
			$date = "Any Time";
		else
			$date = date ( "F", @mktime ($date_month) );
		
		return $date;
	}
	
	///////////////////////////////////////////////////   OLD FUNCTIONS   //////////////////////////////////////////////////////////////
	public static function EncryptQueryString($parameter) {
		$hash = md5 ( md5 ( $parameter ) );
		$count = strlen ( $parameter );
		$parameter = $count . $hash . $parameter;
		return $parameter;
	}
	
	public static function DecryptQueryString($parameter) {
		$length = substr ( $parameter, 0, 1 );
		$actual_hash = substr ( $parameter, 1, 32 );
		$parameter = substr ( $parameter, 33 );
		
		if (md5 ( md5 ( $parameter ) ) == $actual_hash)
			return $parameter;
		else
			return null;
	}
	
	public static function GetApplicationPath() {
		$development_env = self::CheckEnv ();
		if ($development_env)
			$path = Constant::APPLICATION_PATH_DEV;
		else
			$path = Constant::APPLICATION_PATH_PROD;
		
		return $path;
	}
	
	public static function GetFrontendPath() {
		$development_env = self::CheckEnv ();
		
		if ($development_env)
			$path = Constant::APPLICATION_FRONTEND_PATH_DEV;
		else
			$path = Constant::APPLICATION_FRONTEND_PATH_PROD;
		
		return $path;
	}
	
	public static function GetBackendPath() {
		$development_env = self::CheckEnv ();
		
		if ($development_env)
			$path = Constant::APPLICATION_BACKEND_PATH_DEV;
		else
			$path = Constant::APPLICATION_BACKEND_PATH_PROD;
		
		return $path;
	}
	
	private static function CheckEnv() {
		$ip = getenv ( "REMOTE_ADDR" );
		
		if ($ip == "127.0.0.1")
			return true;
		else
			return false;
	}
	
	public static function FormatDate($date) {
		
		$date_year = substr ( $date, 0, 4 );
		$date_month = substr ( $date, 5, 2 );
		$date_day = substr ( $date, 8, 2 );
		
		$time_hr = substr ( $date, 11, 2 );
		$time_min = substr ( $date, 14, 2 );
		$time_sec = substr ( $date, 17, 2 );
		
		//$date=date("D, F j, Y G:i:s T", mktime($time_hr,$time_min,$time_sec,$date_month,$date_day,$date_year));
		if ($date_year == "0000" || $date == "")
			$date = "Any Time";
		else
			$date = date ( "F j, Y", @mktime ( $time_hr, $time_min, $time_sec, $date_month, $date_day, $date_year ) );
		
		return $date;
	}
	
	
	//following function not working yet
	public static function DateConver1($t1, $t2 = null, $format = 'yfwdhms') {
		$t2 = $t2 === null ? time () : $t2;
		$s = abs ( $t2 - $t1 );
		$sign = $t2 > $t1 ? 1 : - 1;
		$out = array ();
		$left = $s;
		$format = array_unique ( str_split ( preg_replace ( '`[^yfwdhms]`', '', strtolower ( $format ) ) ) );
		$format_count = count ( $format );
		$a = array ('y' => 31556926, 'f' => 2629744, 'w' => 604800, 'd' => 86400, 'h' => 3600, 'm' => 60, 's' => 1 );
		$i = 0;
		foreach ( $a as $k => $v ) {
			if (in_array ( $k, $format )) {
				++ $i;
				if ($i != $format_count) {
					$out [$k] = $sign * ( int ) ($left / $v);
					$left = $left % $v;
				} else {
					$out [$k] = $sign * ($left / $v);
				}
			} else {
				$out [$k] = 0;
			}
		}
		
		return $out;
	}
	
	public static function ValidateUrl($url) {
		$url = @parse_url ( $url );
		
		if (! $url) {
			return false;
		}
		
		$url = array_map ( 'trim', $url );
		$url ['port'] = (! isset ( $url ['port'] )) ? 80 : ( int ) $url ['port'];
		$path = (isset ( $url ['path'] )) ? $url ['path'] : '';
		
		if ($path == '') {
			$path = '/';
		}
		
		$path .= (isset ( $url ['query'] )) ? "?$url[query]" : '';
		
		if (isset ( $url ['host'] ) and $url ['host'] != gethostbyname ( $url ['host'] )) {
			if (PHP_VERSION >= 5) {
				$headers = get_headers ( "$url[scheme]://$url[host]:$url[port]$path" );
			} else {
				$fp = fsockopen ( $url ['host'], $url ['port'], $errno, $errstr, 30 );
				
				if (! $fp) {
					return false;
				}
				fputs ( $fp, "HEAD $path HTTP/1.1\r\nHost: $url[host]\r\n\r\n" );
				$headers = fread ( $fp, 128 );
				fclose ( $fp );
			}
			$headers = (is_array ( $headers )) ? implode ( "\n", $headers ) : $headers;
			
			return ( bool ) preg_match ( '#^HTTP/.*\s+[(200|301|302)]+\s#i', $headers );
		}
		
		return false;
	} // - END - private function ValidateUrl
	

	////////////////////////// functions regarding ratings
	

	// this will update the final user rating
	// input paramter is the user_id
	public static function UpdateUserRating($user_id) {
		
		$employee = EmployeePeer::retrieveByPk ( $user_id );
		
		//extract reviews objects from the employee object
		if ($employee) {
			$reviews = $employee->getReviews ();
			$review_rating = 0;
			$review_count = 0;
			
			//loop through the reviews objects
			foreach ( $reviews as $review ) {
				//get reviewers object inside a review object
				$reviewers = $review->getReviewers ();
				
				//loop through the reviewers objects and add there ratings and also increase count
				foreach ( $reviewers as $reviewer ) {
					//calculate rating
					if ($reviewer->getStatus () == Constant::REVIEW_STATUS_COMPLETED && $reviewer->getRating () > 0) {
						$review_rating = $review_rating + $reviewer->getRating ();
						$review_count ++;
					}
				
				}
			}
			
			// handle diviosion by zero
			if ($review_count > 0)
				$review_rating = $review_rating / $review_count;
				
			// round and set employee rating
			$employee->setRating ( $review_rating );
			$employee->save ();
		}
	
	} //end function
	

	//this will update rating in review table
	public static function UpdateReviewRating($review_id) {
		$c = new Criteria ( );
		$c->add ( ReviewPeer::ID, $review_id );
		$review = ReviewPeer::doSelectOne ( $c );
		
		$c = new Criteria ( );
		$c->add ( ReviewerPeer::REVIEW_ID, $review_id ); //where review_id matches the given review id
		//Get all reviwers which are not marked as  0 and completed
		$c->add ( ReviewerPeer::RATING, 0, Criteria::NOT_EQUAL );
		$c->add ( ReviewerPeer::STATUS, Constant::REVIEW_STATUS_COMPLETED ); // and the reviewer has complete the reviews
		$reviewers = ReviewerPeer::doSelect ( $c );
		
		// if there is some reviewer, update review rating based on reviewers ratings
		if ($reviewers) {
			$sum = 0;
			$divider = 0;
			foreach ( $reviewers as $reviewer ) {
				//calculate rating
				$sum += $reviewer->getRating ();
				$divider += 1;
			}
			
			$rating = $sum / $divider;
			$review->setRating ( $rating );
			$review->save ();
		} //if there is no reviewer left, then set the review rating to 0
else {
			$review->setRating ( 0 );
			$review->save ();
		
		}
	
	} //end function
	

	public static function UpdateReviewerRating($reviewer_id, $review_id) {
		
		$c = new Criteria ( );
		$c->add ( ReviewerPeer::REVIEW_ID, $review_id );
		$c->add ( ReviewerPeer::BY_EMPLOYEE_ID, $reviewer_id );
		$reviewer = ReviewerPeer::doSelectOne ( $c );
		
		$c = new Criteria ( );
		$c->add ( ReviewResultPeer::REVIEW_ID, $reviewer->getReviewId () );
		$c->add ( ReviewResultPeer::BY_EMPLOYEE_ID, $reviewer->getByEmployeeId () );
		//Get all answers which are not marked as N/A e.g., 0
		$c->add ( ReviewResultPeer::ANSWER, 0, Criteria::NOT_EQUAL );
		$review_results = ReviewResultPeer::doSelect ( $c );
		
		if ($review_results) {
			$sum = 0;
			$divider = 0;
			foreach ( $review_results as $result ) {
				$sum += $result->getAnswer ();
				$divider += 1;
			}
			
			$rating = $sum / $divider;
			$reviewer->setRating ( $rating );
			$reviewer->save ();
		}
	
	} //end function
	////////////////////////////////////////////
	

	public static function UpdateCompanyGrades($company_id) {
		$c = new Criteria ( );
		$c->add ( EmployeePeer::COMPANY_ID, $company_id );
		$employees = EmployeePeer::doSelect ( $c );
		
		foreach ( $employees as $employee ) {
			//calculate the employee grade
			

			/*$c = new Criteria();
			$c->add(EmployeeGradePeer::COMPANY_ID,$company_id);
			$c->add(EmployeeGradePeer::STATUS,Constant::RECORD_STATUS_ACTIVE);
			$c->add(EmployeeGradePeer::MIN_VALUE, round ($employee->getRating(),Constant::ROUND_RATING),Criteria::LESS_EQUAL);
			$c->add(EmployeeGradePeer::MAX_VALUE, round ($employee->getRating(),Constant::ROUND_RATING),Criteria::GREATER_EQUAL);
			$grade = EmployeeGradePeer::doSelectOne($c);

			
			
			if($grade)
			$grade_id = $grade->getId();
			else 
			$grade_id = NULL;
			*/
			
			$connection = Propel::getConnection ();
			$rating = round ( $employee->getRating (), Constant::ROUND_RATING );
			$query = 'SELECT * FROM %s where company_id = %s and status = %s and ' . $rating . ' >= %s and ' . $rating . ' <= %s';
			$query = sprintf ( $query, EmployeeGradePeer::TABLE_NAME, $employee->getCompanyId (), Constant::RECORD_STATUS_ACTIVE, EmployeeGradePeer::MIN_VALUE, EmployeeGradePeer::MAX_VALUE );
			$statement = $connection->prepare ( $query );
			$statement->execute ();
			$grade = $statement->fetch ( PDO::FETCH_OBJ );
			
			if ($grade)
				$grade_id = $grade->id;
			else
				$grade_id = NULL;
				
			//now save employee object wicth calculated grade and rating
			$employee->setGradeId ( $grade_id );
			$employee->save ();
		}
	
	}
	
	public static function UpdateEmployeeGrade($employee_id) {
		
		$employee = EmployeePeer::retrieveByPk ( $employee_id );
		
		/*$c = new Criteria();
		$c->add(EmployeeGradePeer::COMPANY_ID,sfContext::getInstance()->getUser()->getAttribute('COMPANY_ID'));
		$c->add(EmployeeGradePeer::STATUS,Constant::RECORD_STATUS_ACTIVE);
		
		$c->add(EmployeeGradePeer::MIN_VALUE, round ($employee->getRating(),Constant::ROUND_RATING),Criteria::LESS_EQUAL);
		$c->add(EmployeeGradePeer::MAX_VALUE, round ($employee->getRating(), Constant::ROUND_RATING),Criteria::GREATER_EQUAL);		
		$grade = EmployeeGradePeer::doSelectOne($c);

		
		if($grade)
		$grade_id = $grade->getId();
		else 
		$grade_id = NULL;*/
		
		$connection = Propel::getConnection ();
		$rating = round ( $employee->getRating (), Constant::ROUND_RATING );
		$query = 'SELECT * FROM %s where company_id = %s and status = %s and ' . $rating . ' >= %s and ' . $rating . ' <= %s';
		$query = sprintf ( $query, EmployeeGradePeer::TABLE_NAME, $employee->getCompanyId (), Constant::RECORD_STATUS_ACTIVE, EmployeeGradePeer::MIN_VALUE, EmployeeGradePeer::MAX_VALUE );
		$statement = $connection->prepare ( $query );
		$statement->execute ();
		$grade = $statement->fetch ( PDO::FETCH_OBJ );
		
		if ($grade)
			$grade_id = $grade->id;
		else
			$grade_id = NULL;
			
		//now save employee object wicth calculated grade and rating
		$employee->setGradeId ( $grade_id );
		$employee->save ();
	}
	
	// new function added to return the grade of a review
	// assuming that the grades title in employee_grade table are used here
	// date: september 02,2009
	public static function GetReviewGrade($review_id) {
		
		$c = new Criteria ( );
		$c->add ( ReviewPeer::ID, $review_id );
		$review = ReviewPeer::doSelectOne ( $c );
		
		if ($review) {
			$connection = Propel::getConnection ();
			$rating = round ( $review->getRating (), Constant::ROUND_RATING );
			$query = 'SELECT * FROM %s where company_id = %s and status = %s and ' . $rating . ' >= %s and ' . $rating . ' <= %s';
			$query = sprintf ( $query, EmployeeGradePeer::TABLE_NAME, $review->getEmployee()->getCompanyId (), Constant::RECORD_STATUS_ACTIVE, EmployeeGradePeer::MIN_VALUE, EmployeeGradePeer::MAX_VALUE );
			$statement = $connection->prepare ( $query );
			$statement->execute ();
			$grade = $statement->fetch ( PDO::FETCH_OBJ );
			
			if ($grade){
				
				$grade_title = $grade->title;
			
			}
			else
				$grade_title = NULL;
				
			return $grade_title;	
				
		} else {
			return null;
		}
	}
}

?>