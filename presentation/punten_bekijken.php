<?php
require_once('../services/ModuleService.php');
require_once('../services/PersoonService.php');
require_once('../services/PuntenService.php');

$moduleService = new ModuleService();
$persoonService = new PersoonService();
$puntenService = new PuntenService();

$modules = $moduleService->getModules();
$personen = $persoonService->getPersonen();

?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Punten Bekijken</title>
    <link rel="stylesheet" href="../css/default.css">
</head>
<body>
    <h1>Punten Bekijken</h1>
    <h2>Op basis van module</h2>
    <table>
        <thead>
            <tr>
                <th>Module</th>
                <?php foreach ($personen as $persoon): ?>
                    <th><?php echo $persoon->getVoornaam() . ' ' . $persoon->getFamilienaam(); ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($modules as $module): ?>
                <tr>
                    <td><?php echo $module->getNaam(); ?></td>
                    <?php foreach ($personen as $persoon): ?>
                        <td>
                            <?php
                            $punt = $puntenService->getPuntByID($module->getId(), $persoon->getId());
                            echo $punt ? $punt->getPunt() : '-';
                            ?>
                        </td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Op basis van persoon</h2>
    <table>
        <thead>
            <tr>
                <th>Persoon</th>
                <?php foreach ($modules as $module): ?>
                    <th><?php echo $module->getNaam(); ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($personen as $persoon): ?>
                <tr>
                    <td><?php echo $persoon->getVoornaam() . ' ' . $persoon->getFamilienaam(); ?></td>
                    <?php foreach ($modules as $module): ?>
                        <td>
                            <?php
                            $punt = $puntenService->getPuntByID($module->getId(), $persoon->getId());
                            echo $punt ? $punt->getPunt() : '-';
                            ?>
                        </td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
