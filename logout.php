<?php
    // Memulai session
    session_start();
    // Menghancurkan session yang ada
    session_destroy();
    // Mengarahkan pengguna ke halaman login
    echo "<script>location='login'</script>";
