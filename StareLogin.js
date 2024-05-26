
document.addEventListener('DOMContentLoaded', function() {
    var stareLogare = document.getElementById('stare-logare');
    console.log("Mesaj de test1");
    if (username !== '') {
        console.log("Mesaj de test2");
        console.log("username= "+ username);
        stareLogare.innerHTML = "<a class='nav-link' href='logout.php'>Logout "+username+"</a>";
    } else {
        console.log("Mesaj de test3");
        stareLogare.innerHTML = "<a class='nav-link' href='login.php'>Login/Sign in</a>";
    }
});

