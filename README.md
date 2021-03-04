<h1>Codes Searcher - zadanie testowe</h1>

<h2>Instalacja</h2>
1. Należy utworzyć bazę danych "codes-searcher" w MySQL (+ opcjonalnie zmienić dane połączenia w pliku .env)<br>
2. Wykonać migrację "php artisan migrate" - tabela "codes" wypełniona jest losowymi wartościami<br>
3. Plik "app.php" z katalogu "config_example" podmienić w folderze "config"<br>

<h2>Użycie</h2>
API dostępne jest pod adresem <b>"/api/search" (POST)</b> i obsługuje parametry:<br>
name - używane porównanie "LIKE %x%"<br>
code - dokładne porównanie<br>
Zakres dat lub od/do:<br>
date_from, date_to<br>
<br><br>

API nie wymaga użycia tokena.
