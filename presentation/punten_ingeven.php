<?php
require_once('../services/ModuleService.php');
require_once('../services/PersoonService.php');
require_once('../services/PuntenService.php');

$moduleService = new ModuleService();
$persoonService = new PersoonService();
$puntenService = new PuntenService();

$modules = $moduleService->getModules();
$personen = $persoonService->getPersonen();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $moduleID = $_POST['moduleID'];
    $persoonID = $_POST['persoonID'];
    $punt = $_POST['punt'];

        // Voeg het punt toe
        $puntenService->addPunt($moduleID, $persoonID, $punt);
        echo "Punt succesvol toegevoegd.";
    } 
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Punten Ingeven</title>
</head>
<body>
    <h1>Punten Ingeven</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="moduleID">Module:</label>
        <select name="moduleID" id="moduleID">
            <?php foreach ($modules as $module): ?>
                <option value="<?php echo $module->getId(); ?>"><?php echo $module->getNaam(); ?></option>
            <?php endforeach; ?>
        </select><br>
        <label for="persoonID">Persoon:</label>
        <select name="persoonID" id="persoonID">
            <?php foreach ($personen as $persoon): ?>
                <option value="<?php echo $persoon->getId(); ?>"><?php echo $persoon->getVoornaam() . ' ' . $persoon->getFamilienaam(); ?></option>
            <?php endforeach; ?>
        </select><br>
        <label for="punt">Punt:</label>
        <input type="number" name="punt" id="punt" min="0" max="100" required><br>
        <input type="submit" value="Toevoegen">
    </form>
</body>
</html>
