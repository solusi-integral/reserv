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
                $this->_weeklyreport();
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
            
            // Store Daily Report into Database
            $this->__dailyreport();
            
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
                    // Send SMS using Twilio API
                    $this->_pesan();
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
                // Send SMS using Twilio API
                $this->_pesan();
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
        
        private function _pesan()
        {
            /**
             * Metode Untuk Mengirim SMS Melalui Twilio
             * 
             * Metode ini digunakan untuk mengirimkan SMS melalui API Twilio.
             * 
             * @author Indra Kurniawan <indra@indramgl.web.id>
             * 
             * @var object  $service    Object dari API Twilio
             * @var mixed   $number     Nomor Telepon Twilio Kita
             * @var mixed   $dest       Nomor telepon pelamar
             * @var int     $kode       Kode aktivasi HP
             * @var string  $message    Pesan yang dikirim ke HP pelamar
             * @var object  $msg        Hasil proses API Twilio, message ID
             * 
             */
            
            // Memanggil helper Twilio
            $this->load->helper('twilio');
            // Menginisiasi API Twilio
            $service = get_twilio_service();
            // Nomor Twilio kita
            $number = "+12677056262";
            $dest   = "+6285729416149";
            // Konfigurasi pesan yang akan dikirim ke pelamar
            $message    = "Operation team has missed 5 races consecutively. This is an automated notification.";
            
            // Mengirim perintah SMS ke API Twilio
            $msg = $service->account->messages->sendMessage($number, $dest, $message);
            
            // Call
            $service->account->calls->create('+622933216262', '+628116118440', 'http://demo.twilio.com/docs/voice.xml', array( 
                    'Method' => 'GET',  
                    'FallbackMethod' => 'GET',  
                    'StatusCallbackMethod' => 'GET',  
                    'IfMachine' => 'Hangup', 
                    'Timeout' => '60', 
                    'Record' => 'false', 
            ));
            
            // Mengembalikan hasil ke fungsi pemanggil
            return $msg->sid;
            //$this->load->view('lamaran_sendsms');
        }
        
        private function __mailmissed($id)
        {
            $race   = $this->__lookup30races($id);
            if ($race['sepuluh'] == 5)
            {
                $this->__mailonmissed5();
            }
            else if ($race['sepuluh'] == 6)
            {
                $this->__mailonmissed5();
            }
            else if ($race['sepuluh'] == 7)
            {
                $this->__mailonmissed5();
            }
            else if ($race['sepuluh'] == 8)
            {
                $this->__mailonmissed5();
            }
            else if ($race['sepuluh'] == 9)
            {
                $this->__mailonmissed5();
            }
            else if ($race['sepuluh'] == 10)
            {
                $this->__mailonmissed5();
            }
            
            if ($race['tigapuluh'] == 30)
            {
                $this->__mailonmissed30();
            }
            //$this->output->set_output($race['sepuluh']);
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
            //$this->output->set_output($alert);
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
        private function __dailyreport()
        {
            // Load database model for easier database related task
            $this->load->model('result_model','',TRUE);
            // Load date helper for date related task
            $this->load->helper('date');
            // Load Cache Driver
            $this->load->driver('cache');
            
            // Get Current Time
            $waktu      = now();
            // Get standarized date format YYYY-MM-DD, aka 2015-12-02
            //$time       = date("Y-m-d", $waktu);
            
            // Get Time for key
            $time        = date("Y-m-d", strtotime("-1 days"));
            $today       = date("Y-m-d", $waktu);
            
            $key1   = 'IdfhJdf'.$today;
            
            // Check if there is a record for today already
            if ( ! $counter = $this->cache->memcached->get($key1))
                    {
                        $counter    = $this->result_model->count($time);
                        // Save data to Memcached
                        $this->cache->memcached->save($key1, $counter, 72000);
                    }
            
            if ($counter == 1)
            {
                // Set memcached key
                $key    = "Pusxg".$time;
                
                if ( ! $perce = $this->cache->memcached->get($key))
                    {
                        $query  = $this->result_model->lookup($time);
                        // Store result into $data variable
                        foreach ($query as $row)
                        {
                            $perce = $row->percentage;
                        }
                        // Save data to Memcached
                        $this->cache->memcached->save($key, $perce, 2160000);
                    }
                return;
            }
            
            else if ($counter == 0)
            {
                $this->load->library('performance');
                $yesterday  = $this->performance->yesterday_green();
                
                $this->result_model->insert($yesterday,$time);
                
                return;
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
        private function _weeklyreport()
        {
            $this->load->library('performance');
            $this->load->model('result_model');
            // Load Cache Driver
            $this->load->driver('cache');
            $currentWeekNumber = date('W');
            $currentYear    = date('Y');
            $lastWeek       = $currentWeekNumber-1;
            $timeba     = $currentYear.'W'.$lastWeek.'1';
            $timebe     = $currentYear.'W'.$lastWeek.'7';
            
            $key1       = 'IDfhOdk'.$currentYear.$lastWeek;
            if ( ! $counter = $this->cache->memcached->get($key1))
                    {
                        $counter    = $this->result_model->week_count($lastWeek,$currentYear);
                        // Save data to Memcached
                        $this->cache->memcached->save($key1, $counter, 72000);
                    }
                    
            if ($counter == 0)
            {
                $weekly_tot = $this->performance->get_weekly_total($timeba,$timebe);
                $weekly_rul = $this->performance->get_weekly_red_ul($timeba,$timebe);
                $weekly_rdl = $this->performance->get_weekly_red_dl($timeba,$timebe);

                $weekly_red = $weekly_rul+$weekly_rdl;

                $green      = $weekly_tot-$weekly_red;

                $perce      = round($green/$weekly_tot*100, 2);
                $this->result_model->week_insert($lastWeek,$currentYear,$perce);
                $this->_mail($perce);
            }
            
            else if ($counter == 1)
            {
                $key1       = '34UfkjUAwf'.$currentYear.$lastWeek;
                if ( ! $counter = $this->cache->memcached->get($key1))
                        {
                            $query    = $this->result_model->week_lookup($lastWeek,$currentYear);
                            // Store result into $data variable
                            foreach ($query as $row)
                            {
                                $perce = $row->percentage;
                            }
                            // Save data to Memcached
                            $this->cache->memcached->save($key1, $perce, 2160000);
                        }
            }
            
            return;
            //$this->output->set_output($counter);
        }
        
        private function _mail($perce)
        {
            $this->load->helper('mandrill');
            $service    = get_mandrill_service();
            
            $message = array(
                'html' => '
                        <div dir=3D"ltr">Hello Mr. MacDonald,<div><br></div><div>This is an automat=
                        ed weekly report sent by the system.=C2=A0</div><div><br></div><div>In this=
                         email we like to inform you that last week performance was at <b>'.$perce.'</b> %.=
                        </div><div><br></div><div>Thank you,</div><div><br></div><div>Solusi Integr=
                        al</div></div>',
                'text' => 'Hello Mr. MacDonald,

                        This is an automated weekly report sent by the system.

                        In this email we like to inform you that last week performance was at *'.$perce.'*
                        %.

                        Thank you,

                        Solusi Integral
                        ',
                'subject' => 'Weekly Performance Report',
                'from_email' => 'no-reply@solusi-integral.co.id',
                'from_name' => 'Solusi Integral',
                'to' => array(
                    array(
                        'email' => 'indra@indramgl.web.id',
                        'name' => 'Indra Kurniawan',
                        'type' => 'to'
                    )
                ),
                'headers' => array('Reply-To' => 'support@solusi-integral.co.id'),
                'important' => false,
                'track_opens' => true,
                'track_clicks' => true,
                'auto_text' => null,
                'auto_html' => null,
                'inline_css' => null,
                'url_strip_qs' => null,
                'preserve_recipients' => null,
                'view_content_link' => null,
                'bcc_address' => 'indra@solusi-integral.co.id',
                'tracking_domain' => null,
                'signing_domain' => null,
                'return_path_domain' => null,
                'merge' => true,
                'merge_language' => 'mailchimp',
                /**'global_merge_vars' => array(
                    array(
                        'name' => 'merge1',
                        'content' => 'merge1 content'
                    )
                ),
                'merge_vars' => array(
                    array(
                        'rcpt' => 'recipient.email@example.com',
                        'vars' => array(
                            array(
                                'name' => 'merge2',
                                'content' => 'merge2 content'
                            )
                        )
                    )
                ),*/
                'tags' => array('reserv'),
                'subaccount' => 'reserv',
                //'google_analytics_domains' => array('example.com'),
                //'google_analytics_campaign' => 'message.from_email@example.com',
                //'metadata' => array('website' => 'www.example.com'),
                /**'recipient_metadata' => array(
                    array(
                        'rcpt' => 'recipient.email@example.com',
                        'values' => array('user_id' => 123456)
                    )
                ),
                'attachments' => array(
                    array(
                        'type' => 'text/plain',
                        'name' => 'myfile.txt',
                        'content' => 'ZXhhbXBsZSBmaWxl'
                    )
                ),
                'images' => array(
                    array(
                        'type' => 'image/png',
                        'name' => 'IMAGECID',
                        'content' => 'ZXhhbXBsZSBmaWxl'
                    )
                )*/
            );
            $async = false;
            $ip_pool = 'Main Pool';
            //$send_at = date(now);
            $service->messages->send($message, $async, $ip_pool);
            /*
            Array
            (
                [0] => Array
                    (
                        [email] => recipient.email@example.com
                        [status] => sent
                        [reject_reason] => hard-bounce
                        [_id] => abc123abc123abc123abc123abc123
                    )

            )
            */
        }
}

/* End of file report.php */
/* Location: ./application/controllers/report.php */