<?php

function formSubmitted() {
    return isset($_POST['submit']);
}

if (formSubmitted()) {
    $numberFrom = $_POST['from'];
    $numberTo = $_POST['to'];

    if ($numberTo > $numberFrom) {
        $random = rand($numberFrom, $numberTo);
    } else {
        header('Location: ./');
        die();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Random Number Generator</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
        <link href="css/reset.css" rel="stylesheet" type="text/css">
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <div class="panel">
                <h2 class="panel-title"><?= (!formSubmitted()) ? 'Random Number Generator' : 'Result' ?></h2>
                <?php if (!formSubmitted()) { ?>
                    <form action="./" method="post">
                        <div class="form-input">
                            <input type="number" min="0" max="9999999" name="from" value="0" placeholder="Number from" required>
                            <span class="help">Number has to be between 0 and 9999999.</span>
                        </div>
                        <div class="form-input">
                            <input type="number" min="0" max="9999999" name="to" value="1" placeholder="Number to" required>
                            <span class="help">Number has to be between 0 and 9999999, and higher than number 'from'!</span>
                        </div>
                        <button class="btn btn-regular" type="submit" name="submit">Randomize</button>
                    </form>
                <?php } else { ?>
                    <h1 class="text-result"><?= $random ?></h1>
                    <form action="./" method="post">
                        <input type="hidden" name="from" value="<?= $_POST['from'] ?>">
                        <input type="hidden" name="to" value="<?= $_POST['to'] ?>">
                        <button class="btn btn-regular w-svg" type="submit" name="submit">
                            <svg width="11" height="10" viewBox="0 0 11 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.50001 1.44141V4.10807H6.9502" stroke="#222F3E" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M8.43099 6.33247C8.15475 7.15021 7.63186 7.8519 6.94112 8.3318C6.25038 8.8117 5.42921 9.04382 4.60135 8.99317C3.7735 8.94252 2.98381 8.61185 2.35129 8.05099C1.71876 7.49012 1.27767 6.72945 1.09449 5.8836C0.911301 5.03775 0.995942 4.15255 1.33566 3.36139C1.67537 2.57023 2.25175 1.91597 2.97794 1.4972C3.70414 1.07843 4.5408 0.91785 5.36185 1.03965C6.1829 1.16144 6.94386 1.55902 7.53006 2.17247L9.49766 4.11025" stroke="#222F3E" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            Again
                        </button>
                    </form>
                    <a href="./" class="link">go back to the form</a>
                <?php } ?>
            </div>
        </div>
    </body>
</html>
