<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <a href="./index.php"><i class="fa fa-home"></i></a>
<table>
    <thead>
    <th>#id</th><th>Megnevezés</th><th>Művelet&nbsp;<button><a href="./county.php"><i class="fa fa-plus"></i></a></button></th>
    </thead>
    <tbody>
        <form method="post" action="counties.php">
            <input type="text" name="needle" value="">
            <button type="submit" name="btn-search" method="post">Keresés</button>
        </form>
    <?php
        require_once('ItemRepository.php');
        $itemRepository = new ItemRepository();

        if (isset($_POST['btn-cancel'])) {
            
        }

        if (isset($_POST['btn-save'])) {
            $countyName = $_POST['county_name'];
            $countyId = $_POST['county_id'];

            $itemRepository->updateCounty($countyId, $countyName);
        }

        if (isset($_POST['btn-save-new'])) {
            $countyName = $_POST['county_name'];

            $itemRepository->saveCounty($countyName);        
        }

        if (isset($_POST['btn-search'])) {
            $needle = $_POST['needle'];

            $counties = $itemRepository->searchCounty($needle);        
        }
        if (!isset($counties))
        {
            $counties = $itemRepository->getAllCounties();
        }

        foreach ($counties as $county) {
            echo ''
            . '<tr>'
                . '<td>' . $county['id'] . '</td>'
                . '<td>' . $county['name'] . '</td>'
                . '<td><div style="display: flex">'
                    . '<form method ="post" action="county.php">
                            <button type="submit">
                                  <i class="fa fa-pencil"></i>
                            </button>
                            <input type="hidden" name="id" value="' . $county['id'] . '">
                        </form>'

                    . '<form method ="post" action="counties.php">
                            <button type="submit">
                                <i class="fa fa-pencil"></i>
                            </button>
                            <input type="hidden" name="id" value="' . $county['id'] . '">
                    </form>'
                        
                . '</div></td>'
            . '</tr>';
        }
    ?>
    </tbody>
</table>
</body>
</html>