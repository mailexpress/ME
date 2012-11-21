<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lulzgotskill
 */
?>

<head>
    <?php
    echo "<style>";
    include 'css/reg_form.css';
    echo "</style>";
    ?>
</head>
<body>
<h1>Registration:</h1>
<form action="?module=registration" id="registration_form" method="post">
    <p>
        <label class="registration_label">Username:</label><input name="user_name" class="registration_input">
        <label class="registration_label">Password:</label><input name="user_pass" class="registration_input">
        <label class="registration_label">Re-enter Password:</label><input name="user_confirm_pass" class="registration_input">
        <label class="registration_label">E-mail:</label><input name="user_mail" class="registration_input">
        <label class="registration_label">Re-enter E-mail:</label><input name="user_confirm_mail" class="registration_input"">
    <hr class="registration_hr" />
    <input type="submit" class="registration_submit">
    </p>
</form>
</body>