<html>
    <head>
        <title>Entry Form For Location</title>
    </head>
    <body style="background-color:#E6E6FA">
        <?php 
            //Create form
            echo form_open('data/data_add'); 
        
            //Form Label
            echo form_label('Location ');
                $data_name = array(
                'name' => 'loc_name',
                'id' => 'loc_name',
                'class' => 'input_box',
                'placeholder' => 'Please Enter Name'
                );

                echo form_input($data_name);
            
                $data_gender = array(
                    'G' => 'G',
                    'T' => 'T',
                    'R' => 'R'
                );

                echo form_dropdown('race_type', $data_gender, 'G', 'class="dropdown_box"');
            
            echo form_submit('submit', 'Submit', "class='submit'");
            
            echo form_close();
        ?>
    </body>
</html>