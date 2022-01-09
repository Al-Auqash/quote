<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php?include=quote">Quotes</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample07">
            <?php if (isset($_SESSION['id'])) { ?>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php?include=create-quote">Create Quote</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php?include=sign-out">Sign Out</a>
                    </li>
                </ul>
            <?php } ?>
        </div>
    </div>
</nav>