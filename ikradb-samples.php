<?php 
# First Step 
require_once('ikra.php'); 

# Add database Object 
$ikra = new database('root', '***', 'toplanti','localhost'); 
// database( your_database_user , your_database_password , your_database , your_server ); 

# Add Modify Object 
$dr = $ikra->ModifySQL('tb_tasra_personel', array('adi_soyadi','email'), array('İzmir SGK','izmir@sgk.gov.tr'),"WHERE idtb_tasra_personel = '333'");
// ModifySQL( your_table , your_table_columns , your_table_columns_new_values , your_sql_clause ) 

# Add Insert Object 
$dr = $ikra->InsertSQL('tb_tasra_personel', array('adi_soyadi','email'), array('İzmir SGK','izmir@sgk.gov.tr')); 
// InsertSQL( your_table , your_table_columns , your_table_columns_insert_values ) 

# Add Delete Object 
$dr = $ikra->DeleteSQL('tb_tasra_personel', "WHERE idtb_tasra_personel = '324'"); 
// DeleteSQL( your_table , your_sql_clause ) 

# Add Table List Object 
$table1 = $ikra->Table('tb_tasra_personel'); 
foreach ($table1 as $row) { 
        echo $row["adi_soyadi"].'<br>'; 
} 
// Table( only_your_table_name ) 

# Add Query List Object 
$query1 = $ikra->Query("SELECT * FROM tb_tasra_personel"); 
foreach ($query1 as $row) { 
        echo $row["adi_soyadi"].'<br>'; 
} 
//single row example 
echo $query1[0]["adi_soyadi"]; 
// Query( only_your_sql_clause ) 

# Add Table Object 
$table1 = $ikra->Table('tb_tasra_personel'); //add table object 
// Table( only_your_table_name ) 

# Add DBGrid with Table Object 
echo $ikra->DBGrid($table1, array('adi_soyadi'=>"Adı Soyadı", 'email'=>"E-Posta"), 20, 0); //customize dbgrid columns 
// DBGrid( your_table_object, table_columns, row_count , active_page_index ) 

# Add DBGrid with Table Object 
echo $ikra->DBGrid($table1, array(), 20, 0); //all columns 
// DBGrid( your_table_object, array(), row_count , active_page_index ) 

# Add record count text with Table Object 
echo $ikra->RecordCount($table1); //show $table1 RecordCount 
// RecordCount( only_your_table_name ) 

# Close database Object 
$ikra->Destroy(); 
?>