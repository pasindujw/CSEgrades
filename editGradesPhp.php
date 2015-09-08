<?php
if (isset($_POST['submit'])) {
    
    updateGradeValues('A+',$_POST['A+']);
    updateGradeValues('A',$_POST['A']);
    updateGradeValues('A-',$_POST['A-']);
    updateGradeValues('B+',$_POST['B+']);
    updateGradeValues('B',$_POST['B']);
    updateGradeValues('B-',$_POST['B-']);
    updateGradeValues('C+',$_POST['C+']);
    updateGradeValues('C',$_POST['C']);
    updateGradeValues('C-',$_POST['C-']);
    updateGradeValues('D',$_POST['D']);
    updateGradeValues('F',$_POST['F']);
    updateGradeValues('I-ca',$_POST['I-ca']);
    updateGradeValues('I-we',$_POST['I-we']);
    
    echo '
<script>
    showSuccess("Changes are successfully saved");
</script>';
        
}
?>