<?php
defined('_JEXEC') or die('Restricted access'); ?>

<form action="" method="post" enctype="multipart/form-data" >

    <h3> Dodaj PDFA</h3>

    <div class="form-group">
        <label for="pliki">Wybierz Pdfa</label>
        <input type="file" id="pliki" multiple="multiple" name="task4[]">
    </div>
    </br>
    <button type="submit" name="wyslij" class="btn btn-primary">Dodaj Pdfa</button>


</form>

<?php 

$najwiekszeID = $_FILES['task4']['name'][0];


for( $i=0; $i<count($_FILES['task4']['size']); $i++ ){

if( strstr($_FILES['task4']['type'][$i], 'pdf')!==false ){

//zmienia nazwę pliku, by zgadzały się z ID w bazie danych
$file = JPATH_ROOT.'/administrator/modules/mod_pdfloud/pdf/'.$najwiekszeID.'.pdf';
//wysyła plik na serwer
move_uploaded_file($_FILES['task4']['tmp_name'][$i], $file);

//wyświetla komunikat o powodzeniu
echo '<div class="alert alert-success" role="alert">Pdf został zapisany na serwerze. Nazwa Pliku '.$najwiekszeID.'.pdf</div>';
//zwiększa ID dla kolejnych zdjęć w pętli

$najwiekszeID++;
}




}
?>