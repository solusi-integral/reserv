<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @package     Reserv
 * @author      CV Solusi Integral
 * @copyright   Copyright (c) 2014 CV Solusi Integral
 * @link http://www.solusi-integral.co.id CV Solusi Integral
 */

class Report extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
        
        /**
        * API Calls from Remote
        * 
        * This method allows the performance report to be recorded to the database automatically.
        * It should be called via HTTPS
        * All variable must be present to avoid errors.
        * 
        * API Call URL: https://reserv.solusi-integral.co.id/index.php/report/record/DATE/JUMP_TIME/TYPE/RUNNERS/NUMBER/LOCATION/RESULT/NAME/COMMENT
        * API Call URL example: https://reserv.solusi-integral.co.id/index.php/report/record/20150803/161700/G/8/3/NORTHAM/7/INDRA/none
        * 
        * @api
        * @var     int     $date       Format YYYYMMDD
        * @var     int     $jump_time  Format  HHMMSS. Must be URL Encoded.
        * @var     string  $type       Three option (R,T,G)
        * @var     int     $runners    Number of runners
        * @var     int     $number     Race Number
        * @var     string  $location   Location Name. Must be URL Encoded.
        * @var     int     $result     Click Result
        * @var     string  $comment    Race Comment . Must be URL Encoded.
        */
        public function record($date, $jump_date, $type, $runners, $number, $location, $results, $name, $comment)
        {
            
            // Load database model for easier database related task
            $this->load->model('report_model','',TRUE);
            // Load date helper for date related task
            $this->load->helper('date');
            // Change local time to GMT
            $gmt                = local_to_gmt(now());
            // Sydney time zone
            $sydtz              = 'UP10';
            // DST Observation
            $dst                = TRUE;
            // Daily operation time
            $timeb              = 1200;
            $timee              = 2200;
            $timeba             = 0000;
            $timeea             = 0001;
            // Race types
            $gtype  = 'G';
            $ttype  = 'T';
            $rtype  = 'R';
            // Reconvert date from GMT to Sydney timezone
            $acttime            = date("Hi", gmt_to_local($gmt, $sydtz, $dst));
            // Get what day is it?
            $actday             = date("D", gmt_to_local($gmt, $sydtz, $dst));
            
            // Exclude saturday from count
            if ($actday == "Sat")
            {
                $data['counted']    = 0;
            }
            
            // Count races during operational time
            else if ($acttime >= $timeb and $acttime <= $timee){
                //Filter counted races  and uncounted races
                if ($type == $rtype)
                {
                    $data['counted']    = 0;
                } else{
                    // Exclude standing start races
                    if ($comment == 'Standing Start' or $comment == 'Standing_Start'){
                        $data['counted']    = 0;   
                    } else {
                        $data['counted']    = 1;
                    }
                }
            }
            else if ($acttime >= $timeba and $acttime <= $timeea){
                if ($type == $rtype)
                {
                    $data['counted']    = 0;
                } 
                
                else{
                    // Exclude Standing start races
                    if ($comment == 'Standing Start' or $comment == 'Standing_Start'){
                        $data['counted']    = 0;   
                    } else {
                        $data['counted']    = 1;
                    }
                }
            }
            // Black hole if race criteria doesn't met above
            else {
                $data['counted']    = 0;
            }
            
            // Decode time from POST data
            $decode_time            = rawurldecode($jump_date);
            // Store POST data into array
            $data['date']           = $date;
            $data['jump_date']      = $decode_time;
            $data['type']           = $type;
            $data['runners']        = $runners;
            $data['number']         = $number;
            // Decode location from remote location
            $loc                    = rawurldecode(str_replace('_', '%20', $location));
            $data['location']       = $loc;
            $data['results']        = $results;
            $data['name']           = $name;
            // Decode name from remote location
            $data['comment']        = rawurldecode(str_replace('_', '%20', $comment));
            //$this->load->view('report_view',$data);
            // Insert data into database
            $this->db->insert('result', $data);
            // Get last insert ID
            $id = $this->db->insert_id();
            // Store insert ID into array
            $data2['race_id']        = $id;
            
            // Individual data for each type
            if ($type == $gtype) 
            {
                // Return boolean value
                $status    = $this->db->insert('gtype', $data);
            }
            else if ($type == $ttype) 
            {
                // Return boolean value
                $status     = $this->db->insert('ttype', $data);
            }
            else if ($type == $rtype)
            {
                // Return boolean value
                $status     = $this->db->insert('rtype', $data);
            }
            
            // Set status based on return
            if ($status == 1)
            {
                $status2    = "201 Data recoded!";
            }
            else if ($status == 0)
            {
                $status2    = "530 Failed reconding!";
            }
            
            // Insert required data into array
            $data2['Status']        = $status2;
            $data2['Location']      = $loc;
            $data2['Result']        = $results;
            
            // Send notification if ops team missed 5, 10, or 30 races.
            $this->__mailmissed($id);
            
            // Proccess the output using private function __jsonoutput
            $this->__jsonoutput($data2);
        }
        
        /**
         * Print JSON Formatted Data
         * 
         * This function will print JSON formatted data to the remote caller
         * If the process if going well then system will give HTTP code 201 and
         * additional HTTP header called X-RESERV-CODE: 200 OK. X-RESERV-CODE is
         * required by the remote system to determine whether the calls is succeed.
         * 
         * @var array   $data       Array from another function
         * @param type $data
         */
        private function __jsonoutput($data)
        {
            // Set the output into a JSOn formated data
            $this->output->set_content_type('application/json');
            // Set HTTP header to 201 Accepted
            $this->output->set_status_header('201');
            // Set HTTP header
            $this->output->set_header('X-RESERV-CODE: 200 OK');
            // Encode the data into JSON
            $this->output->set_output(json_encode($data));
        }
        
        /**
         * A Dispacther for creating or post a note to a ticket
         * 
         * This function will determine whether the system should create a new
         * ticket or just update existing ticket. The basic functionality in 
         * this function is check whether there is a ticket open on that day by
         * looking up the database. If there is no existing ticket then this
         * method will create a new one, and insert into the database with 
         * ticket ID and date. Everytime this method is called it will update a 
         * field in the database by adding the counter value.
         * 
         * @param string $message     Message that we want to include in the ticket
         * @param string $subject     Ticket subject
         * @param string $email       Email address of our client
         * @param string $cc_emails   Send a copy to
         * @return bool
         */
        private function __ticketdispatcher($message, $subject, $email, $cc_emails)
        {
            // Load database model for easier database related task
            $this->load->model('notif_model','',TRUE);
            // Load date helper for date related task
            $this->load->helper('date');
            
            // Get Current Time
            $waktu      = now();
            // Get standarized date format YYYY-MM-DD, aka 2015-12-02
            $time       = date("Y-m-d", $waktu);
            
            // Check if there is a record for today already
            $counter    = $this->notif_model->count($time);
            
            if ($counter == 1)
            {
                // If there is a record for today then get the detail
                $query      = $this->notif_model->lookup($time);

                // Store each field into variables.
                foreach ($query as $row)
                {
                    // Store ticket id into new variable
                    $ticket = $row->ticket_id;
                    // Store notif couter into new variable
                    $notif  = $row->notif_5;
                }
                
                // when the notif field reached 5
                if ($notif == 5)
                {
                    // call another function to update ticket
                    $this->__freshdsk_update($ticket);
                    // Set notif couter back to 0
                    $notif      = 0;
                    // Update the database
                    $this->notif_model->update_ticket($ticket,$notif);
                } 
                
                // when the notif field is not reached 5 then add the value
                else
                {
                    // Set the counter value
                    $notif      = $notif+1;
                    // Just update the ticket on the database
                    $this->notif_model->update_ticket($ticket,$notif);
                }
            }
            
            // If the counter is 0 or nothing on that date
            else if ($counter == 0)
            {
                // Create new ticket by calling this method
                $freshdsk   = $this->__freshdsk_create($message, $subject, $email, $cc_emails);
                // Decode the returned value from JSON into PHP Array
                $fresh_decode   = json_decode($freshdsk);
                // Store certain decoded data into new variable
                foreach ($fresh_decode as $row)
                {
                    // Store display id into new variable
                    $ticket_id  = $row->display_id;
                }
                
                // Insert the ticket id and time to the database
                $this->notif_model->insert($ticket_id,$time);
            }
            
            return;
        }
        
        /**
         * Create New Freshdesk Ticket
         * 
         * Create a new freshdesk ticket using freshdesk publised API. This
         * function work using cURL, with some predefined variable.
         * 
         * @see https://freshdesk.com/api#create_ticket
         * 
         * @param string $description   Description of the ticket
         * @param string $subject       Subject of the ticket
         * @param string $email         Client's email
         * @param string $cc_emails     Copy sent to
         * @return array
         */
        private function __freshdsk_create($description, $subject, $email, $cc_emails)
        {
            // Freshdesk URL
            $fd_domain = "https://cvsolusiintegral.freshdesk.com";
            // Freshdesk API key
            $token = "ggXySu214rbWhkDJpAKU";
            // Predefined password
            $password = "X";
            // Array for the data inserted
            $data = array(
                "helpdesk_ticket" => array(
                    "description" => $description,
                    "subject" => $subject,
                    "email" => $email,
                    "priority" => 1,
                    "status" => 2
                ),
                "cc_emails" => $cc_emails
            );
            // Encode the data into JSON formated data
            $json_body = json_encode($data, JSON_FORCE_OBJECT | JSON_PRETTY_PRINT);
            // Set request header
            $header[] = "Content-type: application/json";
            // Set the API end point
            $connection = curl_init("$fd_domain/helpdesk/tickets.json");
            curl_setopt($connection, CURLOPT_RETURNTRANSFER, true);
            // Set cURL HTTP Header
            curl_setopt($connection, CURLOPT_HTTPHEADER, $header);
            curl_setopt($connection, CURLOPT_HEADER, false);
            // Set basic HTTP Auth using cRUL
            curl_setopt($connection, CURLOPT_USERPWD, "$token:$password");
            // Set request using POST command
            curl_setopt($connection, CURLOPT_POST, true);
            // POST data
            curl_setopt($connection, CURLOPT_POSTFIELDS, $json_body);
            curl_setopt($connection, CURLOPT_VERBOSE, 1);
            // Store the RAW result into array
            $response = curl_exec($connection);
            // return the data into function caller
            return $response;
        }
        
        /**
         * 
         * @param int $id
         * @return array
         */
        private function __freshdsk_update($id)
        {
            $API_KEY = "ggXySu214rbWhkDJpAKU";
            // verify if you are using https, and change accordingly!
            $FD_ENDPOINT = "https://cvsolusiintegral.freshdesk.com"; 
            $payload = array(
              'helpdesk_note[body]' => 'Operation team has missed another 5 races',
              'helpdesk_note[private]' => 'false'
              // php5.4 & below: 'helpdesk_note[attachments][][resource]' =>  "@x.png"
              //'helpdesk_note[attachments][][resource]' =>  curl_file_create("data/x.png", "image/png", "x.png")
            );
            //$json_body  = json_encode($payload, JSON_FORCE_OBJECT | JSON_PRETTY_PRINT);
            $header[] = "Content-type: multipart/form-data";
            $url = "$FD_ENDPOINT/helpdesk/tickets/".$id."/conversations/note.json";
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
            curl_setopt($ch, CURLOPT_USERPWD, "$API_KEY:X");
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $server_output = curl_exec($ch);
            return $server_output;
        }
        
        /**
             * 
             * 
             * Ref: https://github.com/osTicket/osTicket-1.7/blob/develop/setup/doc/api.md
             * Ref: https://github.com/osTicket/osTicket-1.7/blob/develop/setup/doc/api/tickets.md
             */
        private function __osticket($name,$email,$subject,$message)
        {   
            $config = array(
                  'url'=>'http://ticket.local.solusi-integral.co.id/api/tickets.json',  // URL to site.tld/api/tickets.json
                  'key'=>'73E5B1264DC9D4327D3B695932BE89B6'  // API Key goes here
            );
            
            $data = array(
                'name'      =>      $name,  // from name aka User/Client Name
                'email'     =>      $email,  // from email aka User/Client Email
                'phone'     =>      '123456789',  // phone number aka User/Client Phone Number
                'subject'   =>      $subject,  // test subject, aka Issue Summary
                'message'   =>      $message,  // test ticket body, aka Issue Details.
                'ip'        =>      '161.202.10.197', // Should be IP address of the machine thats trying to open the ticket.
                'topicId'   =>      '10' // the help Topic that you want to use for the ticket 
                //'Agency'  =>		'58', //this is an example of a custom list entry. This should be the number of the entry.
                //'Site'	=>		'Bermuda'; // this is an example of a custom text field.  You can push anything into here you want.	
                //'attachments' => array()
            );
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $config['url']);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_USERAGENT, 'osTicket API Client v1.8');
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array( 'Expect:', 'X-API-Key: '.$config['key']));
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, FALSE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            $result=curl_exec($ch);
            $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if ($code != 201)
                {
                    die('Unable to create ticket: '.$result);
                }
            $ticket_id = (int) $result;
            
            return $result;
        }
        
        private function __mailmissed($id)
        {
            $race   = $this->__lookup30races($id);
            if ($race['lima'] == 5)
            {
                $this->__mailonmissed5();
            }
            if ($race['sepuluh'] == 10)
            {
                $this->__mailonmissed10();
            }
            
            if ($race['tigapuluh'] == 30)
            {
                $this->__mailonmissed30();
            }
            return;
        }
        
        /**
             * Send Automated Email Notification When Missed 5 Races
             * 
             * This function will send an automated email notification using
             * MandrillAPI to predefined email address. Placed insert this
             * controller because everytime there is remote API calls it should
             * be handled by this controller. Therefore, it is suitable for 
             * automated reporting. Why? When there is incoming report that's 
             * means remote server is functional.
             * Why we don't place it on pjax or something similar? Because those
             * function require at least one active visitor to make it works.
             * 
             * How does it works?
             * 
             * Everytime the remote server call this controller to enter a new 
             * data, @record function will get a unique ID for every valid data.
             * We use that unique ID to do backward lookup. How many? Depending 
             * on the required notification level.
             * 
             * Github Issue ID #11 
             */
        private function __mailonmissed5()
        {   
            $name       = 'Mr. A. McDonald';
            $subject    = 'Operation Team Has Missed 5 Consecutive Race';
            $email      = 'boz_m@hotmail.com';
            $message    = 'Dear Mr. McDonald,
​
                            ​This is an automated notification generated by the system.
                            ​
                            ​I want to let you know that the operation team has missed 5 consecutive race as of now. This could be a false alarm. Operation team will follow-up this ticket to explain why they have missed 5 race.
                            ​
                            ​If you have any question, please let us know by replying to this email.
                            ​
                            ​We apologize for this inconvenience, and thank you for your cooperation.
                            ​

                            ​';
            $cc_emails  = 'indra.kurniawan@yahoo.co.id';
            $result     = $this->__ticketdispatcher($message, $subject, $email, $cc_emails);
            return $result;
        }
        
        /**
             * Send Automated Email Notification When Missed 5 Races
             * 
             * This function will send an automated email notification using
             * MandrillAPI to predefined email address. Placed insert this
             * controller because everytime there is remote API calls it should
             * be handled by this controller. Therefore, it is suitable for 
             * automated reporting. Why? When there is incoming report that's 
             * means remote server is functional.
             * Why we don't place it on pjax or something similar? Because those
             * function require at least one active visitor to make it works.
             * 
             * Github Issue ID #11
             * 
             * How does it works?
             * 
             * Everytime the remote server call this controller to enter a new 
             * data, @record function will get a unique ID for every valid data.
             * We use that unique ID to do backward lookup. How many? Depending 
             * on the required notification level.
             */
        private function __mailonmissed10()
        {
            $name       = 'Mr. A. McDonald';
            $subject    = 'Operation Team Has Missed 10 Consecutive Race';
            $email      = 'boz_m@hotmail.com';
            $message    = 'Dear Mr. McDonald,
​
                            ​This is an automated notification generated by the system.
                            ​
                            ​I want to let you know that the operation team has missed 10 consecutive race as of now. This could be a false alarm. Operation team will follow-up this ticket to explain why they have missed 10 race.
                            ​
                            ​If you have any question, please let us know by replying to this email.
                            ​
                            ​We apologize for this inconvenience, and thank you for your cooperation.
                            ​

                            ​';
            //$result     = $this->__osticket($name, $email, $subject, $message);
            return;
        }
        
        /**
             * Send Automated Email Notification When Missed 5 Races
             * 
             * This function will send an automated email notification using
             * MandrillAPI to predefined email address. Placed insert this
             * controller because everytime there is remote API calls it should
             * be handled by this controller. Therefore, it is suitable for 
             * automated reporting. Why? When there is incoming report that's 
             * means remote server is functional.
             * Why we don't place it on pjax or something similar? Because those
             * function require at least one active visitor to make it works.
             * 
             * Github Issue ID #11
             * 
             * How does it works?
             * 
             * Everytime the remote server call this controller to enter a new 
             * data, @record function will get a unique ID for every valid data.
             * We use that unique ID to do backward lookup. How many? Depending 
             * on the required notification level.
             */
        private function __mailonmissed30()
        {
            $name       = 'Mr. A. McDonald';
            $subject    = 'Operation Team Has Missed 30 Consecutive Race';
            $email      = 'boz_m@hotmail.com';
            $message    = 'Dear Mr. McDonald,
​
                            ​This is an automated notification generated by the system.
                            ​
                            ​I want to let you know that the operation team has missed 30 consecutive race as of now. This could be a false alarm. Operation team will follow-up this ticket to explain why they have missed 30 race.
                            ​
                            ​If you have any question, please let us know by replying to this email.
                            ​
                            ​We apologize for this inconvenience, and thank you for your cooperation.
                            ​

                            ​';
            //$result     = $this->__osticket($name, $email, $subject, $message);
            return;
        }
        
        // Please change it back to private function when you are done
        private function __lookup30races($id)
        {
            // Load Report_model helper
            $this->load->model('report_model');
            
            // Get race ID for the last 30 races.
            $id_cur = $id;
            $id_01  = $id-1;
            $id_02  = $id-2;
            $id_03  = $id-3;
            $id_04  = $id-4;
            $id_05  = $id-5;
            $id_06  = $id-6;
            $id_07  = $id-7;
            $id_08  = $id-8;
            $id_09  = $id-9;
            $id_10  = $id-10;
            $id_11  = $id-11;
            $id_12  = $id-12;
            $id_13  = $id-13;
            $id_14  = $id-14;
            $id_15  = $id-15;
            $id_16  = $id-16;
            $id_17  = $id-17;
            $id_18  = $id-18;
            $id_19  = $id-19;
            $id_20  = $id-20;
            $id_21  = $id-21;
            $id_22  = $id-22;
            $id_23  = $id-23;
            $id_24  = $id-24;
            $id_25  = $id-25;
            $id_26  = $id-26;
            $id_27  = $id-27;
            $id_28  = $id-28;
            $id_29  = $id-29;
            $id_30  = $id-30;
            
            // Lookup data from database based on race id
            $query_01  = $this->__processrace($id_cur);
            $query_02  = $this->__processrace($id_01);
            $query_03  = $this->__processrace($id_02);
            $query_04  = $this->__processrace($id_03);
            $query_05  = $this->__processrace($id_04);
            $query_06  = $this->__processrace($id_05);
            $query_07  = $this->__processrace($id_06);
            $query_08  = $this->__processrace($id_07);
            $query_09  = $this->__processrace($id_08);
            $query_10  = $this->__processrace($id_09);
            $query_11  = $this->__processrace($id_10);
            $query_12  = $this->__processrace($id_11);
            $query_13  = $this->__processrace($id_12);
            $query_14  = $this->__processrace($id_13);
            $query_15  = $this->__processrace($id_14);
            $query_16  = $this->__processrace($id_15);
            $query_17  = $this->__processrace($id_16);
            $query_18  = $this->__processrace($id_17);
            $query_19  = $this->__processrace($id_18);
            $query_20  = $this->__processrace($id_19);
            $query_21  = $this->__processrace($id_20);
            $query_22  = $this->__processrace($id_21);
            $query_23  = $this->__processrace($id_22);
            $query_24  = $this->__processrace($id_23);
            $query_25  = $this->__processrace($id_24);
            $query_26  = $this->__processrace($id_25);
            $query_27  = $this->__processrace($id_26);
            $query_28  = $this->__processrace($id_27);
            $query_29  = $this->__processrace($id_28);
            $query_30  = $this->__processrace($id_29);
            $query_31  = $this->__processrace($id_30);
            
            $race['lima']       = $query_01 + $query_02 + $query_03 + $query_04 + $query_05;
            $race['sepuluh']    = $race['lima'] + $query_06 + $query_07 + $query_08 + $query_09 + $query_10;
            $race['tigapuluh']  = $race['sepuluh'] + $query_11 + $query_12 + $query_13 + $query_14 + $query_15 + $query_16 + $query_17 + $query_18 + $query_19 + $query_20 + $query_21 + $query_22 + $query_23 + $query_24 + $query_25 + $query_26 + $query_27 + $query_28 + $query_29 + $query_30;

            return $race;
        }
        
        private function __processrace($id)
        {
            // Load Report_model helper
            $this->load->model('report_model');
            // Load Cache Driver
            $this->load->driver('cache');
            if ( ! $data = $this->cache->memcached->get($id))
            {
                // Get race info based on race id
                $query  = $this->report_model->info_race($id);
                // Store result into $data variable
                $data   = $query->result();
                // Save data to Memcached
                $this->cache->memcached->save($id, $data, 7200);
            }
            
            // Convert array into variable
            foreach ($data as $row) {
                $nama       = $row->Name;
                $counted    = $row->Counted;
            }
            
            // Determine whether we should sent alert based on race result
            // Only for those which are counted
            if ($counted == 1)
            {
                // Only for missed races
                if ($nama == 'none')
                {
                    $alert = 1;
                }
                
                else {
                    $alert = 0;
                }
            }
            else {
                $alert  = 0;
            }
            
            // Return boolean value to function caller
            return $alert;
        }
        
        /**
         * Method to Store Daily Performance to Database
         * 
         * This method will calculate yesterday performance from database, and 
         * then store the value to database. Instead current function by doing
         * full table scan.
         * 
         * Calculation will be done every day on the first data submitted by
         * remote server.
         * 
         */
        public function dailyreport()
        {
            // Load database model for easier database related task
            $this->load->model('result_model','',TRUE);
            // Load date helper for date related task
            $this->load->helper('date');
            
            $this->load->helper('security');
            
            // Get Current Time
            $waktu      = now();
            // Get standarized date format YYYY-MM-DD, aka 2015-12-02
            $time       = date("Y-m-d", $waktu);
            $key        = date("Ymd", $waktu);
            
            // Check if there is a record for today already
            $counter    = $this->result_model->count($time);
            
            if ($counter == 1)
            {
                //return;
                echo $key;
            }
            
            else if ($counter == 0)
            {
                $this->load->library('performance');
                $yesterday  = $this->performance->yesterday_green();
                
                $this->result_model->insert($yesterday,$time);
                echo $key;
            }
            
        }
        
        /**
         * Method to Store Weekly Performance to Database
         * 
         * This method will calculate last week performance from database, and 
         * then store the value to database. Instead current function by doing
         * full table scan.
         * 
         * Calculation will be done every Saturday.
         * 
         */
        private function __weeklyreport()
        {
            
        }
}

/* End of file report.php */
/* Location: ./application/controllers/report.php */