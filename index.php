<?php
include_once 'config/app.php';

include_once 'controllers/AuthenticationController.php';
include_once 'controllers/adminController.php';

?>
<?php
var_dump (


    $_SESSION['authenticated'] .' '.
    $_SESSION['auth_role'] .' '.
    $_SESSION['auth_user']['user_id'] .' '.
    $_SESSION['auth_user']['user_fname'] .' '.
    $_SESSION['auth_user']['user_lname'] .' '.
    $_SESSION['auth_user']['user_email']

);


?>
<h1>HELLO</h1>

<!-- Inscrip
if (isset($_POST['login_btn'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $auth = new LoginController();

    $noEmpty_data = $auth->checkDataEmpty($email, $password);

    if ($noEmpty_data) {
        echo "No empty field";
    } else {

        $result_user = $auth->login($email);

        if ($result_user) {
            if (password_verify($password, $result_user['password'])) {

                $login->userAuthentication($result_user);

                if ($result_user['is_admin'] == 1) {
                    // header("Location:admindashbord.php");
                    echo 'Admin Connected !';
                } else {
                    // header("Location:acceuil.php");
                    echo 'User Connected !';
                }
            } else {

                echo "Bad credentials";
            }
        } else {
            // redirect("Bad credentials", "login.php");
            echo "Bad credentials";
        }
    }
}

if (isset($_POST['logout_btn'])) {
    $checkedLoggedOut = $auth->logout();
    if ($checkedLoggedOut) {
        // redirect("Logged Out Successfully", "login.php");
    }
}tion
migration dans une liste d'attente inactif
Il peut voir son dashbord et voir son solde mais ne peut effectuer aucune oppération
Admin fait passer le compte à actif 
** il pourra effectuer des translations avec alert(message)

***Etat 3
 -->