<html>
    <head>
        <title>Entry Form For Location</title>
    </head>
    <body>
        <?php 
            //Create form
            echo form_open('data/data_race'); 
        
            //Form Label
            echo form_label('Race Result');
            
            //create jump time Hour field
            $data_jt_hour = array(
            'name' => 'jt_hour',
            'id' => 'jt_hour',
            'class' => 'input_box',
            'placeholder' => 'Hour'
            );
            
            echo form_input($data_jt_hour);
            
            //create jump time Minutes field
            $data_jt_min = array(
            'name' => 'jt_min',
            'id' => 'jt_min',
            'class' => 'input_box',
            'placeholder' => 'Min'
            );
            
            echo form_input($data_jt_min);
            
            echo form_label('Race Type');

            //create dropdown box
            $data_race_type = array(
            'G' => 'G',
            'T' => 'T',
            'R' => 'R'
            );
            
            echo form_dropdown('race_type', $data_race_type, 'G', 'class="dropdown_box"');
            
            //create Runner dropdown box
            $data_runner = array(
            '0' => '0',
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5',
            '6' => '6',
            '7' => '7',
            '8' => '8',
            '9' => '9',
            '10' => '10',
            '11' => '11',
            '12' => '12',
            '13' => '13',
            '14' => '14',
            '15' => '15',
            '16' => '16',
            '17' => '17',
            '18' => '18',
            '19' => '19',
            '20' => '20'
            );
            echo form_label('Race Runner');
            echo form_dropdown('runner', $data_runner, '1', 'class="dropdown_box"');
            
            //create race number dropdown box
            $data_race_number = array(
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5',
            '6' => '6',
            '7' => '7',
            '8' => '8',
            '9' => '9',
            '10' => '10',
            '11' => '11',
            '12' => '12',
            '13' => '13',
            '14' => '14',
            '15' => '15',
            '16' => '16',
            '17' => '17',
            '18' => '18',
            '19' => '19',
            '20' => '20'
            );
            echo form_label('Race Number');
            echo form_dropdown('race_number', $data_race_number, '1', 'class="dropdown_box"');
            
            //create race number dropdown box
            foreach ($location as $row)
            {
                $data_location[$row->Location] = $row->Location;
            }
            //echo form_label('Race');
            echo form_dropdown('location', $data_location, 'BENALLA', 'class="dropdown_box"');
            
            //Create Data Entry Operator
            $data_race_oper  = array(
                'Indra' => 'Indra',
                'Surya' => 'Surya'
            );
            echo form_dropdown('data_oper', $data_race_oper, 'Indra', 'class="dropdown_box"');
            
            //create performance result field
            $data_perf = array(
            'name' => 'perf',
            'id' => 'perf',
            'class' => 'input_box',
            'placeholder' => 'Remote Result'
            );
            
            echo form_input($data_perf);
            
            echo form_submit('submit', 'Submit', "class='submit'");
            
            echo form_close();
        ?>
    </body>
</html>