<?php if(isset($_SESSION['success'])){ ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Succès',
                text: '<?= $_SESSION['success'] ?>',
                timer: 5000
            })
        </script>
             
<?php } unset($_SESSION['success']); ?>

<?php if(isset($_SESSION['error'])){ ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Echec de connexion',
                text: '<?= $_SESSION['error'] ?>',
                timer: 5000
            })
        </script>
             
<?php } unset($_SESSION['error']); ?>

<?php if(isset($_SESSION['checked'])){ ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: "Echec d'enrégistrement",
                text: '<?= $_SESSION['checked'] ?>',
                timer: 5000
            })
        </script>
             
<?php } unset($_SESSION['checked']); ?>